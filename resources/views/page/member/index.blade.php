<x-app title="Outlets">
   @if (session('status'))
   <div class="alert alert-success alert-dismissible fade show text-white mb-4" role="alert">
      <span class="alert-icon align-middle">
         <span class="material-icons text-md">
         thumb_up_off_alt
         </span>
      </span>
      <span class="alert-text"><strong>Success!</strong>&nbsp;&nbsp;{{ session('status') }}</span>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
      </button>
   </div>
   @endif
   <div class="row">
      <div class="col-12">
         <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
               <div class="bg-gradient-primary shadow-primary border-radius-lg py-4 px-3">
                  <div class="row">
                     <div class="col-6 d-flex align-items-center">
                        <h6 class="text-white text-capitalize mb-0">Members Table</h6>
                     </div>
                     <div class="col-6 text-end">
                        <button class="btn btn-sm bg-gradient-dark mb-0" data-bs-toggle="modal" data-bs-target="#createModal"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New Member</button>
                     </div>
                  </div>
               </div>
            </div>
            <div class="card-body px-0 pb-2">
               <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0" id="membersTable">
                     <thead>
                        <tr>
                           <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                           <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Number</th>
                           <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sex</th>
                           <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Address</th>
                           <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                           <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($members as $item)
                           <tr>
                              <td class="align-middle">
                                 <h6 class="mb-0 px-2 py-1 text-sm px-3">{{ $item->nama }}</h6>
                              </td>
                              <td class="align-middle">
                                 <p class="text-xs font-weight-bold mb-0">{{ $item->tlp }}</p>
                              </td>
                              @if ($item->jenis_kelamin == 'L')
                                 <td class="align-middle text-center text-sm">
                                    <span class="badge badge-sm bg-gradient-info">{{ $item->jenis_kelamin }}</span>
                                 </td>
                              @else
                                 <td class="align-middle text-center text-sm">
                                    <span class="badge badge-sm bg-gradient-primary">{{ $item->jenis_kelamin }}</span>
                                 </td>
                              @endif
                              <td class="align-middle">
                                 <span class="text-secondary text-xs font-weight-bold">{{ $item->alamat }}</span>
                              </td>
                              <td class="align-middle text-center text-sm">
                                 <span class="badge badge-sm bg-gradient-success">Active</span>
                                 <span class="badge badge-sm bg-gradient-secondary">Inactive</span>
                              </td>
                              <td class="align-middle">
                                 <button class="btn btn-link text-dark px-3 mb-0 btnEdit" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{ $item->id }}" data-nama="{{ $item->nama }}" data-jenis-kelamin="{{ $item->jenis_kelamin }}" data-tlp="{{ $item->tlp }}" data-alamat="{{ $item->alamat }}"><i class="material-icons text-sm me-2">edit</i>Edit</button>
                                 <button class="btn btn-link text-danger text-gradient px-3 mb-0 btnHapus" data-bs-toggle="modal" data-bs-target="#hapusModal" data-id="{{ $item->id }}" data-nama="{{ $item->nama }}"><i class="material-icons text-sm me-2">delete</i>Delete</button>
                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
               </div>
            </div>
         </div>
      </div>
   </div>
   <x-slot name="btm">
      @include('page.member._modal')
   </x-slot>
   <x-slot name="script">
      <script>

         $(function () {
            $('#membersTable').on('click', '.btnEdit', function() {
               let row = $(this).closest('tr')
               let id = row.find('td:eq(5) .btnEdit').data('id')
               let nama = row.find('td:eq(5) .btnEdit').data('nama')
               let jenis_kelamin = row.find('td:eq(5) .btnEdit').data('jenis-kelamin')
               let tlp = row.find('td:eq(5) .btnEdit').data('tlp')
               let alamat = row.find('td:eq(5) .btnEdit').data('alamat')

               $('#editModal #id').val(id);
               $('#editModal #nama').val(nama);
               if(jenis_kelamin == "L") {
                  $('#editModal #male').prop('checked', true);
               } else if(jenis_kelamin == "P") {
                  $('#editModal #female').prop('checked', true);
               }
               $('#editModal #tlp').val(tlp);
               $('#editModal #alamat').text(alamat);
            })

            $('#membersTable').on('click', '.btnHapus', function() {
               let row = $(this).closest('tr')
               let id = row.find('td:eq(5) .btnHapus').data('id')
               let nama = row.find('td:eq(5) .btnHapus').data('nama')
               $('#hapusModal #id2').val(id)
               $('#hapusModal #namaMember').text(nama)
            })

            $('.alert').delay(5000).fadeOut('slow');
         })
      </script>
   </x-slot>
</x-app>