@include('layouts.header')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
              <h4 class="card-title">Default form</h4>
              <p class="card-description"> Basic form layout </p>
              {{-- method="post" action="http://127.0.0.1:8000/api/product/addproduct" --}}
              <form id="form" class="forms-sample" method="POST">
                @csrf
                <div class="form-group">
                  <label for="exampleInputUsername1">Name</label>
                  <input type="text" class="form-control" name="name" id="exampleInputUsername1" placeholder="Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Category</label>
                  <input type="text" class="form-control" name = "category" id="exampleInputEmail1" placeholder="Category">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Vendor ID</label>
                  <input type="text" class="form-control" name="vendor_id" id="exampleInputPassword1" placeholder="Vendor ID">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Replacement</label>
                    <input type="text" class="form-control" name="replacement" id="exampleInputPassword1" placeholder="Replacement">
                  </div>
                  <div class="form-check form-check-flat form-check-primary">
                </div>
                <div class="form-group">
                    <label>File upload</label>
                    <input type="file" name="photo" class="file-upload-default">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                      </span>
                    </div>
                  </div>
                <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
              </form>
            </div>
          </div>
         <script>
          const form = document.getElementById('form');

form.addEventListener('submit', function(e) {
    // Prevent default behavior:
    e.preventDefault();
    // Create new FormData object:
    const formData = new FormData(form);
    // Convert formData object to URL-encoded string:
    const payload = new URLSearchParams(formData);
    // Post the payload using Fetch:
    fetch('http://127.0.0.1:8000/api/product/addproduct', {
    method: 'POST',
    body: payload,
    })
    .then(res => res.json())
    .then(data => console.log(data))
})
         </script>
@include('layouts.footer')
