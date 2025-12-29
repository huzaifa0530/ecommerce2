<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductColor;
use App\Models\ProductTab;
use App\Models\ProductTabRow;
use App\Models\ProductPrice;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\ProductTabCell;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


function cleanFileName($name)
{
    return Str::slug($name, '_');
}
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(20);
        return view('dashboard.pages.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.pages.products.create', compact('categories'));
    }


    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $bwTemplatePath = null;
            if ($request->hasFile('bw_template_pdf')) {
                $bwTemplatePath = $request->file('bw_template_pdf')
                    ->store('bw_templates', 'public');
            }

            $product = Product::create([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'item_number' => $request->item_number,
                'description' => $request->description,
                'material' => $request->material,
                'item_size' => $request->item_size,
                'imprint_area' => $request->imprint_area,
                'bw_template_pdf' => $bwTemplatePath,
                'price_include' => $request->price_include,
                'lead_time' => $request->lead_time,
                'MOQ' => $request->MOQ,
                'price_includes' => $request->price_includes,
                'lead_time_repeat' => $request->lead_time_repeat,
                'setup_charge' => $request->setup_charge,
                'repeat_setup' => $request->repeat_setup,
            ]);
            // ✔ Save colors
            // ✔ Save colors
            if ($request->colors) {
                foreach ($request->colors as $index => $colorCode) {

                    // Color Image
                    $colorImage = null;
                    if ($request->color_images[$index] ?? false) {

                        $image = $request->color_images[$index];

                        $extension = $image->getClientOriginalExtension();

                        $colorName = cleanFileName($request->color_names[$index] ?? 'color');

                        $fileName = $product->item_number . '_' . $colorName . '.' . $extension;

                        $colorImage = $image->storeAs(
                            'color_images',
                            $fileName,
                            'public'
                        );
                    }


                    // Color Template PDF
                    $colorTemplate = null;
                    if ($request->color_templates[$index] ?? false) {
                        $colorTemplate = $request->color_templates[$index]
                            ->store('color_templates', 'public');
                    }

                    ProductColor::create([
                        'product_id' => $product->id,
                        'color_name' => $request->color_names[$index] ?? null,
                        'color_code' => $colorCode,
                        'color_image' => $colorImage,
                        'color_template_pdf' => $colorTemplate,
                    ]);
                }
            }


            // ✔ Save product images
            if ($request->product_images) {
                foreach ($request->product_images as $index => $image) {

                    $extension = $image->getClientOriginalExtension();

                    $fileName = 'thmImage_' . $product->item_number . '_' . ($index + 1) . '.' . $extension;

                    $path = $image->storeAs(
                        'product_images',
                        $fileName,
                        'public'
                    );

                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_path' => $path
                    ]);
                }

            }

            // ✔ Save tabs and rows
            // ✔ Save tabs, rows, and cells
            // Example for top tabs
            if ($request->top_tabs) {
                foreach ($request->top_tabs as $tabIndex => $tabTitle) {
                    $tab = ProductTab::create([
                        'product_id' => $product->id,
                        'title' => $tabTitle,
                        'section' => 'top',
                    ]);

                    foreach ($request->top_tab_rows[$tabIndex] ?? [] as $rowIndex => $row) {
                        $tabRow = ProductTabRow::create([
                            'tab_id' => $tab->id,
                            'label' => $row['label'],
                            'value' => null
                        ]);

                        foreach ($row['cells'] ?? [] as $colName => $cellValue) {
                            ProductTabCell::create([
                                'row_id' => $tabRow->id,
                                'column_name' => $colName,
                                'value' => $cellValue
                            ]);
                        }
                    }
                }
            }

            // Example for bottom tabs
            if ($request->bottom_tabs) {
                foreach ($request->bottom_tabs as $tabIndex => $tabTitle) {
                    $tab = ProductTab::create([
                        'product_id' => $product->id,
                        'title' => $tabTitle,
                        'section' => 'bottom',
                    ]);

                    foreach ($request->bottom_tab_rows[$tabIndex] ?? [] as $rowIndex => $row) {
                        $tabRow = ProductTabRow::create([
                            'tab_id' => $tab->id,
                            'label' => $row['label'],
                            'value' => null
                        ]);

                        foreach ($row['cells'] ?? [] as $colName => $cellValue) {
                            ProductTabCell::create([
                                'row_id' => $tabRow->id,
                                'column_name' => $colName,
                                'value' => $cellValue
                            ]);
                        }
                    }
                }
            }

            DB::commit();
            return redirect()->route('products.index')->with('success', 'Product created successfully');

        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', $e->getMessage());
        }
    }
    public function showDetail(Request $request, $id)
    {
        $product = Product::with([
            'category',
            'images',
            'colors',
            'tabs.rows.cells',
            'prices'
        ])->findOrFail($id);

        // Return partial view for modal
        return view('dashboard.pages.partial.product_detail_modal', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::with([
            'colors',
            'images',
            'tabs.rows.cells'
        ])->findOrFail($id);

        $categories = Category::all();

        return view('dashboard.pages.products.edit', compact('product', 'categories'));
    }
    public function update(Request $request, $id)
    {
        DB::beginTransaction();


        try {
            $product = Product::findOrFail($id);

            // Log the entire request for debugging
            Log::info('Update Product Request Data', $request->all());

            // Update product basic info
            $data = $request->only([
                'category_id',
                'name',
                'item_number',
                'description',
                'material',
                'item_size',
                'imprint_area',
                'price_include',
                'lead_time',
                'MOQ',
                'price_includes',
                'lead_time_repeat',
                'setup_charge',
                'repeat_setup'
            ]);

            // Add BW template if uploaded
            if ($request->hasFile('bw_template_pdf')) {
                $data['bw_template_pdf'] = $request->file('bw_template_pdf')->store('bw_templates', 'public');
                Log::info('BW Template uploaded', ['path' => $data['bw_template_pdf']]);
            }

            // Update existing Color Templates
            if ($request->old_color_templates) {
                foreach ($request->old_color_templates as $colorId => $file) {
                    $color = ProductColor::find($colorId);
                    if ($color && $file) {
                        $color->color_template_pdf = $file->store('color_templates', 'public');
                        $color->save();
                        Log::info("Updated existing color template", ['color_id' => $colorId, 'file' => $color->color_template_pdf]);
                    }
                }
            }

            // --------------------------
            // UPDATE OLD COLORS
            // --------------------------
            if ($request->old_colors) {
                foreach ($request->old_colors as $colorId => $colorCode) {
                    $color = ProductColor::find($colorId);
                    if (!$color)
                        continue;

                    $color->color_name = $request->old_color_names[$colorId] ?? $color->color_name;
                    $color->color_code = $colorCode;

                    if ($request->old_color_images[$colorId] ?? false) {

                        $image = $request->old_color_images[$colorId];
                        $extension = $image->getClientOriginalExtension();

                        $colorName = cleanFileName($color->color_name ?? 'color');

                        $fileName = $product->item_number . '_' . $colorName . '.' . $extension;

                        $color->color_image = $image->storeAs(
                            'color_images',
                            $fileName,
                            'public'
                        );
                    }


                    $color->save();
                    Log::info("Updated old color", ['color_id' => $colorId, 'name' => $color->color_name, 'code' => $colorCode]);
                }
            }

            // --------------------------
            // ADD NEW COLORS
            // --------------------------
            if ($request->colors) {
                foreach ($request->colors as $index => $colorCode) {
                    $colorImage = $request->color_images[$index] ?? null;
                    $colorTemplate = $request->color_templates[$index] ?? null;

                    if ($colorImage) {

                        $extension = $colorImage->getClientOriginalExtension();

                        $colorName = Str::slug($request->color_names[$index] ?? 'color', '_');

                        $fileName = $product->item_number . '_' . $colorName . '.' . $extension;

                        $colorImage = $colorImage->storeAs(
                            'color_images',
                            $fileName,
                            'public'
                        );
                    }
                    if ($colorTemplate)
                        $colorTemplate = $colorTemplate->store('color_templates', 'public');

                    $createdColor = ProductColor::create([
                        'product_id' => $product->id,
                        'color_name' => $request->color_names[$index] ?? null,
                        'color_code' => $colorCode,
                        'color_image' => $colorImage,
                        'color_template_pdf' => $colorTemplate,
                    ]);

                    Log::info("Created new color", ['color_id' => $createdColor->id, 'name' => $createdColor->color_name]);
                }
            }

            // --------------------------
            // ADD NEW IMAGES
            // --------------------------
            if ($request->product_images) {
                foreach ($request->product_images as $index => $image) {

                    $extension = $image->getClientOriginalExtension();

                    $fileName = 'thmImage_' . $product->item_number . '_' . time() . '_' . ($index + 1) . '.' . $extension;

                    $path = $image->storeAs(
                        'product_images',
                        $fileName,
                        'public'
                    );

                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_path' => $path
                    ]);
                }


            }

            // --------------------------
            // UPDATE EXISTING TOP TABS
            // --------------------------
            if ($request->old_top_tabs) {
                foreach ($request->old_top_tabs as $tabId => $title) {
                    $tab = ProductTab::find($tabId);
                    if (!$tab)
                        continue;

                    $tab->title = $title;
                    $tab->save();
                    Log::info("Updated top tab title", ['tab_id' => $tabId, 'title' => $title]);

                    foreach ($request->old_top_tab_rows[$tabId] ?? [] as $rowId => $rowData) {
                        $row = ProductTabRow::find($rowId);
                        if (!$row)
                            continue;

                        $row->label = $rowData['label'] ?? '';
                        $row->save();
                        Log::info("Updated top tab row label", ['tab_id' => $tabId, 'row_id' => $rowId, 'label' => $row->label]);

                        // Existing cells
                        $oldCells = $request->old_top_tab_cells[$tabId][$rowId] ?? [];
                        Log::info("Top Tab [$tabId] Row [$rowId] old cells data", $oldCells);

                        foreach ($oldCells as $cellId => $value) {
                            $cell = ProductTabCell::find($cellId);
                            if ($cell) {
                                $cell->value = $value;
                                $cell->save();
                                Log::info("Updated existing cell", ['cell_id' => $cellId, 'value' => $value]);
                            } else {
                                // Create a new cell if ID not found
                                $maxColumn = ProductTabCell::where('row_id', $rowId)->max('column_name') ?? -1;
                                $newCell = ProductTabCell::create([
                                    'row_id' => $rowId,
                                    'column_name' => $maxColumn + 1,
                                    'value' => $value
                                ]);
                                Log::info("Created missing cell for old_top_tab_cells", ['cell_id' => $newCell->id, 'value' => $value]);
                            }
                        }


                        // New columns
                        $newCells = $request->new_top_tab_cells[$tabId][$rowId] ?? [];
                        Log::info("Top Tab [$tabId] Row [$rowId] new cells data", $newCells);
                        foreach ($newCells as $value) {
                            $maxColumn = $row->cells()->max('column_name') ?? -1;
                            $createdCell = ProductTabCell::create([
                                'row_id' => $row->id,
                                'column_name' => $maxColumn + 1,
                                'value' => $value
                            ]);
                            Log::info("Created new cell", ['cell_id' => $createdCell->id, 'value' => $value]);
                        }
                    }

                    // Add new rows in existing tab
                    foreach ($request->new_top_tab_rows[$tabId] ?? [] as $rowIndex => $rowData) {
                        $newRow = ProductTabRow::create([
                            'tab_id' => $tab->id,
                            'label' => $rowData['label'] ?? '',
                            'value' => null
                        ]);

                        // If no cells exist, create 1 default empty cell
                        $cells = $rowData['cells'] ?? [null];
                        foreach ($cells as $colIndex => $cellValue) {
                            ProductTabCell::create([
                                'row_id' => $newRow->id,
                                'column_name' => $colIndex,
                                'value' => $cellValue
                            ]);
                        }
                    }

                }
            }

            // --------------------------
            // UPDATE EXISTING BOTTOM TABS
            // --------------------------
            // --------------------------
// UPDATE EXISTING BOTTOM TABS (Updated like top tabs)
// --------------------------
            if ($request->old_bottom_tabs) {
                foreach ($request->old_bottom_tabs as $tabId => $title) {
                    $tab = ProductTab::find($tabId);
                    if (!$tab)
                        continue;

                    $tab->title = $title;
                    $tab->save();
                    Log::info("Updated bottom tab title", ['tab_id' => $tabId, 'title' => $title]);

                    foreach ($request->old_bottom_tab_rows[$tabId] ?? [] as $rowId => $rowData) {
                        $row = ProductTabRow::find($rowId);
                        if (!$row)
                            continue;

                        $row->label = $rowData['label'] ?? '';
                        $row->save();
                        Log::info("Updated bottom tab row label", ['tab_id' => $tabId, 'row_id' => $rowId, 'label' => $row->label]);

                        // Existing cells by cell ID
                        $oldCells = $request->old_bottom_tab_cells[$tabId][$rowId] ?? [];
                        Log::info("Bottom Tab [$tabId] Row [$rowId] old cells data", $oldCells);

                        foreach ($oldCells as $cellId => $value) {
                            $cell = ProductTabCell::find($cellId);
                            if ($cell) {
                                $cell->value = $value;
                                $cell->save();
                                Log::info("Updated existing bottom cell", ['cell_id' => $cellId, 'value' => $value]);
                            } else {
                                // Create a new cell if ID not found
                                $maxColumn = ProductTabCell::where('row_id', $rowId)->max('column_name') ?? -1;
                                $newCell = ProductTabCell::create([
                                    'row_id' => $rowId,
                                    'column_name' => $maxColumn + 1,
                                    'value' => $value
                                ]);
                                Log::info("Created missing cell for old_bottom_tab_cells", ['cell_id' => $newCell->id, 'value' => $value]);
                            }
                        }

                        // New columns
                        $newCells = $request->new_bottom_tab_cells[$tabId][$rowId] ?? [];
                        Log::info("Bottom Tab [$tabId] Row [$rowId] new cells data", $newCells);
                        foreach ($newCells as $value) {
                            $maxColumn = $row->cells()->max('column_name') ?? -1;
                            $createdCell = ProductTabCell::create([
                                'row_id' => $row->id,
                                'column_name' => $maxColumn + 1,
                                'value' => $value
                            ]);
                            Log::info("Created new bottom cell", ['cell_id' => $createdCell->id, 'value' => $value]);
                        }
                    }

                    // Add new rows in existing bottom tab
                    foreach ($request->new_bottom_tab_rows[$tabId] ?? [] as $rowIndex => $rowData) {
                        $newRow = ProductTabRow::create([
                            'tab_id' => $tab->id,
                            'label' => $rowData['label'] ?? '',
                            'value' => null
                        ]);
                        Log::info("Created new row in bottom tab", ['tab_id' => $tabId, 'row_id' => $newRow->id]);

                        foreach ($rowData['cells'] ?? [] as $colIndex => $cellValue) {
                            $createdCell = ProductTabCell::create([
                                'row_id' => $newRow->id,
                                'column_name' => $colIndex,
                                'value' => $cellValue
                            ]);
                            Log::info("Created new cell in new bottom row", ['cell_id' => $createdCell->id, 'value' => $cellValue]);
                        }
                    }
                }
            }

            // --------------------------
            // ADD NEW TOP TABS
            // --------------------------
            if ($request->top_tabs) {
                foreach ($request->top_tabs as $tabIndex => $tabData) {
                    $tab = ProductTab::create([
                        'product_id' => $product->id,
                        'title' => $tabData['title'] ?? '',
                        'section' => 'top'
                    ]);
                    Log::info("Created new top tab", ['tab_id' => $tab->id]);

                    foreach ($tabData['rows'] ?? [] as $rowIndex => $rowData) {
                        $row = ProductTabRow::create([
                            'tab_id' => $tab->id,
                            'label' => $rowData['label'] ?? '',
                            'value' => null
                        ]);
                        Log::info("Created new row in new top tab", ['row_id' => $row->id]);

                        foreach ($rowData['cells'] ?? [] as $colIndex => $cellValue) {
                            $createdCell = ProductTabCell::create([
                                'row_id' => $row->id,
                                'column_name' => $colIndex,
                                'value' => $cellValue
                            ]);
                            Log::info("Created new cell in new top tab row", ['cell_id' => $createdCell->id, 'value' => $cellValue]);
                        }
                    }
                }
            }

            // --------------------------
            // ADD NEW BOTTOM TABS
            // --------------------------
            if ($request->bottom_tabs) {
                foreach ($request->bottom_tabs as $tabIndex => $tabData) {
                    $tab = ProductTab::create([
                        'product_id' => $product->id,
                        'title' => $tabData['title'] ?? '',
                        'section' => 'bottom'
                    ]);
                    Log::info("Created new bottom tab", ['tab_id' => $tab->id]);

                    foreach ($tabData['rows'] ?? [] as $rowIndex => $rowData) {
                        $row = ProductTabRow::create([
                            'tab_id' => $tab->id,
                            'label' => $rowData['label'] ?? '',
                            'value' => null
                        ]);
                        Log::info("Created new row in new bottom tab", ['row_id' => $row->id]);

                        foreach ($rowData['cells'] ?? [] as $colIndex => $cellValue) {
                            $createdCell = ProductTabCell::create([
                                'row_id' => $row->id,
                                'column_name' => $colIndex,
                                'value' => $cellValue
                            ]);
                            Log::info("Created new cell in new bottom tab row", ['cell_id' => $createdCell->id, 'value' => $cellValue]);
                        }
                    }
                }
            }
            Log::info('OLD TOP TAB CELLS', $request->old_top_tab_cells ?? []);
            Log::info('NEW TOP TAB CELLS', $request->new_top_tab_cells ?? []);
            Log::info('NEW TOP TAB ROWS', $request->new_top_tab_rows ?? []);

            DB::commit();
            return redirect()->route('products.index')->with('success', 'Product updated successfully');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error("Error updating product: " . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return back()->with('error', $e->getMessage());
        }
    }

    public function deleteColor($id)
    {
        $color = ProductColor::findOrFail($id);
        Storage::disk('public')->delete($color->color_image);
        $color->delete();

        return response()->json(['success' => true]);
    }

    public function deleteImage($id)
    {
        $img = ProductImage::findOrFail($id);
        Storage::disk('public')->delete($img->image_path);
        $img->delete();

        return response()->json(['success' => true]);
    }

    public function deleteTab($id)
    {
        $tab = ProductTab::findOrFail($id);

        foreach ($tab->rows as $row) {
            $row->cells()->delete();
            $row->delete();
        }
        $tab->delete();

        return response()->json(['success' => true]);
    }


    public function deleteTabRow($id)
    {
        $row = ProductTabRow::findOrFail($id);
        $row->cells()->delete();
        $row->delete();

        return response()->json(['success' => true]);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success', 'Product deleted successfully');
    }

    public function specialOfferUpdate(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->is_special_offer = $request->is_special_offer;
        $product->special_price_before = $request->special_price_before;
        $product->special_price_after = $request->special_price_after;
        $product->save();

        return response()->json(['success' => true]);
    }
    public function togglePopular(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->is_popular = $request->is_popular ? 1 : 0;
        $product->save();

        return response()->json([
            'success' => true,
            'popular_status' => $product->is_popular
        ]);
    }

}
