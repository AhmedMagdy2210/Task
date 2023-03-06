@include('layouts.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">All products</h4>
                      </p>
                      <table class="table">
                        <script>
                            fetch("http://127.0.0.1:8000/api/products")
                            .then((response) => {
                              if (response.ok) {
                                return response.json();
                              } else {
                                throw new Error("NETWORK RESPONSE ERROR");
                              }
                            })
                            .then(data => {
                                $products = data.products;
                                $products.forEach(product => {
                                    const markup = `
                                    <tr>
                                    <td> ${product.name}</td>
                                    <td>${product.category}</td>
                                    <td>${product.replacement}</td>
                                    <td>${product.vendor_id}</td>
                                    </tr>
                                    `;
                                    document.querySelector('tbody').insertAdjacentHTML('beforeend' , markup);
                                    document.q
                                    console.log(product);
                                });

                            })
                            .catch((error) => console.error("FETCH ERROR:", error));
                            </script>
                        <thead>
                          <tr>
                            <th>Product name</th>
                            <th>Product category</th>
                            <th>Product replacement</th>
                            <th>Product vendorID</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>





@include('layouts.footer')
{{-- category - posts - contact - reviews --}}
