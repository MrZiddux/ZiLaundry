<x-app title="Packages">
   <div id="alertHere"></div>
   <div class="row">
      <div class="col-12">
         <button class="btn btn-sm bg-gradient-dark mb-0" data-bs-toggle="modal" data-bs-target="#createModal"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New Package</button>
         <div id="wrapperTable"></div>
      </div>
   </div>
   <x-slot name="btm">
      @include('page.package._modal')
   </x-slot>
   <x-slot name="script">
      <script>
         const gridPackage = new gridjs.Grid({
            server: {
               method: 'GET',
               url: '/package/getData',
               then: data=>data.map(item =>[
                  item.nama_paket,
                  item.jenis,
                  item.harga,
                  new gridjs.html(
                     `<button class='btn btn-link text-dark px-3 mb-0 btnEdit' data-bs-toggle='modal' data-bs-target='#editModal' data-id='${item.id}' data-namapaket='${item.nama_paket}' data-harga='${item.harga}'><i class='material-icons text-sm me-2'>edit</i>Edit</button>` +
                     `<button class="btn btn-link text-danger text-gradient px-3 mb-0 btnHapus" data-bs-toggle="modal" data-bs-target="#hapusModal" data-id="${item.id}" data-namapaket="${item.nama_paket}"><i class="material-icons text-sm me-2">delete</i>Delete</button>`
                  ),
               ]),
            },
            columns: [
               {
                  name: 'Package Name',
               },
               {
                  name: 'Package Type',
               },
               {
                  name: 'Price',
               },
               {
                  name: 'Actions',
                  sort: false,
               },
            ],
            className: {
               table: 'table align-items-center mb-0',
               thead: 'bg-primary',
               th: 'text-uppercase text-secondary text-xxs font-weight-bolder opacity-7',
               td: 'text-xs font-weight-bold',
            },
            fixedHeader: true,
            sort: true,
            pagination: true,
            search: true,
            resizable: true,
         }).render(document.getElementById("wrapperTable"));

         $(function () {
            $('#gridPackage').on('click', '.btnEdit', function() {
               let row = $(this).closest('tr')
               let id = row.find('td:eq(3) .btnEdit').data('id')
               let nama_paket = row.find('td:eq(3) .btnEdit').data('namapaket')
               let harga = row.find('td:eq(3) .btnEdit').data('harga')

               $('#editModal #id').val(id);
               $('#editModal #nama_paket').val(nama_paket);
               $('#editModal #harga').val(harga);
            })

            $('#gridPackage').on('click', '.btnHapus', function() {
               let row = $(this).closest('tr')
               let id = row.find('td:eq(3) .btnHapus').data('id')
               let nama_paket = row.find('td:eq(3) .btnHapus').data('namapaket')
               $('#hapusModal #id2').val(id)
               $('#hapusModal #namaPackage').text(nama_paket)
            })

            $('#btnCreatePackage').click(function(e) {
               e.preventDefault()
               let createformdata = new FormData(document.getElementById('formCreatePackage'))
               $.ajax({
                  type: 'POST',
                  url: "{{ route('package.store') }}",
                  processData: false,
                  contentType: false,
                  data: createformdata,
                  success: function(data) {
                     if(data.success) {
                           gridPackage.forceRender()
                           $('#createModal').modal('hide')
                           $('#alertHere').html(
                              `<div class="alert alert-success alert-dismissible fade show text-white mb-4 alertAnimation" role="alert">
                                 <span class="alert-icon align-middle">
                                       <span class="material-icons text-md">
                                       thumb_up_off_alt
                                       </span>
                                 </span>
                                 <span class="alert-text"><strong>Success!</strong>&nbsp;&nbsp;Create Data Outlet Successfull</span>
                                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>`
                           )
                     } else {
                           `<div class="alert alert-danger alert-dismissible fade show text-white mb-4 alertAnimation" role="alert">
                              <span class="alert-icon align-middle">
                                 <span class="material-icons text-md">
                                 info
                                 </span>
                              </span>
                              <span class="alert-text"><strong>Success!</strong>&nbsp;&nbsp;Create Data Outlet Successfull</span>
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                              </button>
                           </div>`
                     }
                  }
               })
            })


            $('#btnUpdatePackage').click(function(e) {
               e.preventDefault()
               let updateformdata = new FormData(document.getElementById('formUpdatePackage'))
               $.ajax({
                  type: 'POST',
                  url: "{{ route('package.update') }}",
                  processData: false,
                  contentType: false,
                  data: updateformdata,
                  success: function(data) {
                     if(data.success) {
                           gridOutlet.forceRender()
                           $('#editModal').modal('hide')
                           $('#alertHere').html(
                              `<div class="alert alert-success alert-dismissible fade show text-white mb-4 alertAnimation" role="alert">
                                 <span class="alert-icon align-middle">
                                       <span class="material-icons text-md">
                                       thumb_up_off_alt
                                       </span>
                                 </span>
                                 <span class="alert-text"><strong>Success!</strong>&nbsp;&nbsp;Update Data Outlet Successfull</span>
                                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>`
                           )
                     } else {
                           `<div class="alert alert-danger alert-dismissible fade show text-white mb-4 alertAnimation" role="alert">
                              <span class="alert-icon align-middle">
                                 <span class="material-icons text-md">
                                 info
                                 </span>
                              </span>
                              <span class="alert-text"><strong>Success!</strong>&nbsp;&nbsp;Update Data Outlet Unsuccessfull</span>
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                              </button>
                           </div>`
                     }
                  }
               })
            })

            $('#btnDeletePackage').click(function(e) {
               e.preventDefault()
               let deleteformdata = new FormData(document.getElementById('formDeletePackage'))
               $.ajax({
                  type: 'POST',
                  url: "{{ route('package.destroy') }}",
                  processData: false,
                  contentType: false,
                  data: deleteformdata,
                  success: function(data) {
                     if(data.success) {
                           gridOutlet.forceRender()
                           $('#hapusModal').modal('hide')
                           $('#alertHere').html(
                              `<div class="alert alert-success alert-dismissible fade show text-white mb-4 alertAnimation" role="alert">
                                 <span class="alert-icon align-middle">
                                       <span class="material-icons text-md">
                                       thumb_up_off_alt
                                       </span>
                                 </span>
                                 <span class="alert-text"><strong>Success!</strong>&nbsp;&nbsp;Delete Data Outlet Successfull</span>
                                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>`
                           )
                     } else {
                     `<div class="alert alert-danger alert-dismissible fade show text-white mb-4 alertAnimation" role="alert">
                        <span class="alert-icon align-middle">
                           <span class="material-icons text-md">
                           info
                           </span>
                        </span>
                        <span class="alert-text"><strong>Success!</strong>&nbsp;&nbsp;Delete Data Outlet Unsuccessfull</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                     </div>`
                     }
                  }
               })
            })
         })
      </script>
   </x-slot>
</x-app>
