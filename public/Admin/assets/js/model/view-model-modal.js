$(document).ready(function () {
    $('#viewRequestModal').on('show.bs.modal', function (event) {
        const button = $(event.relatedTarget); // Button that triggered the modal
        const id = button.data('id');
        const modalBody = $(this).find('#modelDetails');

        modalBody.html('<p class="text-center text-muted">Loading details...</p>');

        fetch(`/models/${id}`)
            .then(res => {
                if (!res.ok) throw new Error('Network response was not ok');
                return res.json();
            })
            .then(data => {
                console.log('API data:', data); // <-- Debug: Check API response

                const measurements = data.measurements ? JSON.parse(data.measurements) : {};
                const languages = data.languages ? JSON.parse(data.languages) : [];
                console.log('Gallery URLs:', data.assets?.map(a => convertDriveUrl(a.url)));
                const userRole = document.querySelector('meta[name="user-role"]')?.content || 'guest';
                if (userRole === 'admin' || (userRole === 'brand' && data.owner_id === currentUserId)) {

                    let html = `
                        <!-- Personal Info -->
                        <h6 class="mb-3">Personal Information</h6>
                        <div class="row">
                            <div class="col-sm-6"><strong>Full Name:</strong> ${data.name ?? '-'}</div>
                            <div class="col-sm-6"><strong>Father Name:</strong> ${data.father_name ?? '-'}</div>
                            <div class="col-sm-6"><strong>Date of Birth:</strong> ${data.dob ?? '-'}</div>
                            <div class="col-sm-6"><strong>Age:</strong> ${data.age ?? '-'}</div>
                            <div class="col-sm-6"><strong>Gender:</strong> ${data.gender ?? '-'}</div>
                            <div class="col-sm-6"><strong>Occupation:</strong> ${data.occupation ?? '-'}</div>
                            <div class="col-sm-6"><strong>Nationality:</strong> ${data.nationality ?? '-'}</div>
                            <div class="col-sm-6"><strong>Country:</strong> ${data.country ?? '-'}</div>
                        </div>

                        <hr>
                        <!-- Contact Info -->
                        <h6 class="mb-3">Contact Information</h6>
                        <div class="row">
                            <div class="col-sm-6"><strong>Mobile:</strong> ${data.mobile_no ?? '-'}</div>
                            <div class="col-sm-6"><strong>Home No:</strong> ${data.home_no ?? '-'}</div>
                            <div class="col-sm-6"><strong>Email:</strong> ${data.email ?? '-'}</div>
                            <div class="col-sm-12"><strong>Address:</strong> ${data.address ?? '-'}</div>
                        </div>

                        <hr>
                        <!-- Social -->
                        <h6 class="mb-3">Social Media</h6>
                        <div class="row">
                            <div class="col-sm-4"><strong>Facebook:</strong> ${data.facebook_id ?? '-'}</div>
                            <div class="col-sm-4"><strong>Instagram:</strong> ${data.instagram_id ?? '-'}</div>
                            <div class="col-sm-4"><strong>Snapchat:</strong> ${data.snapchat_id ?? '-'}</div>
                            <div class="col-sm-4"><strong>TikTok:</strong> ${data.tiktok_id ?? '-'}</div>
                            <div class="col-sm-4"><strong>YouTube:</strong> ${data.youtube_id ?? '-'}</div>
                        </div>

                        <hr>
                        <!-- Measurements -->
                        <h6 class="mb-3">Measurements</h6>
                        <div class="row">
                            ${Object.entries(measurements).map(([key, value]) => `
                                <div class="col-sm-4"><strong>${key.replace('_', ' ')}:</strong> ${value ?? '-'}</div>
                            `).join('')}
                        </div>

                        <hr>
                        <!-- Languages -->
                        <h6 class="mb-3">Languages</h6>
                        <p>${languages.length ? languages.join(', ') : '-'}</p>

                        <hr>
         <h6 class="mb-3">NIC Images</h6>
    <div class="row text-center">
        <div class="col-md-6 col-12 mb-3">
            <strong>Front Side:</strong><br>
            ${data.assets?.find(a => a.name === 'cnic_front') ? `
                <iframe src="${convertDriveUrl(data.assets.find(a => a.name === 'cnic_front').url)}"
                        frameborder="0"
                        width="100%"
                        height="200"
                        class="rounded shadow mt-2 border"
                        style="object-fit: cover;"></iframe>
            ` : '-'}
        </div>
        <div class="col-md-6 col-12 mb-3">
            <strong>Back Side:</strong><br>
            ${data.assets?.find(a => a.name === 'cnic_back') ? `
                <iframe src="${convertDriveUrl(data.assets.find(a => a.name === 'cnic_back').url)}"
                        frameborder="0"
                        width="100%"
                        height="200"
                        class="rounded shadow mt-2 border"
                        style="object-fit: cover;"></iframe>
            ` : '-'}
        </div>
    </div>


                        <hr>
                        <!-- Gallery -->
                        <h6 class="mb-3">Gallery</h6>
<div class="row text-center">
  ${data.assets?.map(a =>
                        a.type === 'image' && a.url && a.name !== 'cnic_front' && a.name !== 'cnic_back' ? `
      <div class="col-md-3 col-6 mb-3">
          <iframe src="${convertDriveUrl(a.url)}" 
                  frameborder="0" 
                  width="100%" 
                  height="200" 
                  style="object-fit:cover;">
          </iframe>
      </div>` : ''
                    ).join('')}
</div>

                        ${data.assets?.some(a => a.type === 'video') ? `
                            <hr>
                            <div class="text-center">
                                <a href="${data.assets.find(a => a.type === 'video')?.url}" target="_blank" class="btn btn-outline-primary">
                                    <i class="feather icon-video"></i> Watch Video
                                </a>
                            </div>` : ''}
                    `;
                    modalBody.html(html);
                } else {
                    let html = `
                        <!-- Personal Info -->
                        <h6 class="mb-3">Personal Information</h6>
                        <div class="row">
                            <div class="col-sm-6"><strong>Full Name:</strong> ${data.name ?? '-'}</div>
                            <div class="col-sm-6"><strong>Father Name:</strong> ${data.father_name ?? '-'}</div>
                            <div class="col-sm-6"><strong>Date of Birth:</strong> ${data.dob ?? '-'}</div>
                            <div class="col-sm-6"><strong>Age:</strong> ${data.age ?? '-'}</div>
                            <div class="col-sm-6"><strong>Gender:</strong> ${data.gender ?? '-'}</div>
                            <div class="col-sm-6"><strong>Occupation:</strong> ${data.occupation ?? '-'}</div>
                            <div class="col-sm-6"><strong>Nationality:</strong> ${data.nationality ?? '-'}</div>
                            <div class="col-sm-6"><strong>Country:</strong> ${data.country ?? '-'}</div>
                        </div>

                        <hr>
               

           
        
                        <hr>
                        <!-- Gallery -->
                        <h6 class="mb-3">Gallery</h6>
<div class="row text-center">
  ${data.assets?.map(a =>
                        a.type === 'image' && a.url && a.name !== 'cnic_front' && a.name !== 'cnic_back' ? `
      <div class="col-md-3 col-6 mb-3">
          <iframe src="${convertDriveUrl(a.url)}" 
                  frameborder="0" 
                  width="100%" 
                  height="200" 
                  style="object-fit:cover;">
          </iframe>
      </div>` : ''
                    ).join('')}
</div>

                        ${data.assets?.some(a => a.type === 'video') ? `
                            <hr>
                            <div class="text-center">
                                <a href="${data.assets.find(a => a.type === 'video')?.url}" target="_blank" class="btn btn-outline-primary">
                                    <i class="feather icon-video"></i> Watch Video
                                </a>
                            </div>` : ''}
                    `;
                    modalBody.html(html);
                }

            })
            .catch(err => {
                modalBody.html('<p class="text-danger text-center">Failed to load details.</p>');
                console.error(err);
            });
    });
});
function convertDriveUrl(url) {
    if (!url) return ''; // Handle empty or null URLs

    // Matches: https://drive.google.com/file/d/<FILE_ID>/view or similar patterns
    const match = url.match(/\/file\/d\/([a-zA-Z0-9_-]+)\//);
    if (match && match[1]) {
        const fileId = match[1];
        const convertedUrl = `https://drive.google.com/file/d/${fileId}/preview`;
        console.log(`Converted URL from ${url} to ${convertedUrl}`); // Debug log
        return convertedUrl;
    }

    // Optional: Handling direct IDs or differently formatted URLs
    const directMatch = url.match(/\/([a-zA-Z0-9_-]{20,})/); // Google Drive file IDs are typically 20-30 characters
    if (directMatch && directMatch[1]) {
        const fileId = directMatch[1];
        const convertedUrl = `https://drive.google.com/file/d/${fileId}/preview`;
        console.log(`Converted URL from ${url} to ${convertedUrl}`); // Debug log
        return convertedUrl;
    }

    console.log(`Failed to convert URL: ${url}`); // Log failures
    return url; // Return original URL if conversion fails
}