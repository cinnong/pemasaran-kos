@extends('admin.app')
@extends('components.footer.admin')
@extends('components.navbar.admin')
@extends('components.sidebar')

@section('title', 'Banner')

@section('content')
<div class="flex justify-between mb-4">
    <h1 class="text-xl font-medium mb-4 text-gray-800">Data Banner</h1>

    <button id="modal-tambah" data-modal-target="default-modal" data-modal-show="default-modal" class="block text-white bg-emerald-700 hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-emerald-600 dark:hover:bg-emerald-700 dark:focus:ring-blue-800" type="button">
        Tambah
    </button>
</div>
<div class="relative overflow-x-auto sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 pb-4">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Gambar
                </th>

                <th scope="col" class="px-6 py-3">
                </th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Tambah Banner
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">

                <div class="row">
                    <div class="rol-md-12">
                        <form class="form-banner">
                                <div class="mb-5">
                                <label for="banner" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar</label>
                                <input accept="image/*" type="file" name="image">
                            </div>
                            <div class="flex items-end px-4 pt-4 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button data-modal-hide="default-modal" type="button" class="me-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Batal</button>
                                <button type="submit" class="text-white bg-emerald-700 hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-emerald-600 dark:hover:bg-emerald-700 dark:focus:ring-blue-800">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('js')
<script type="module">

    $(function() {
        $.ajax({
            url: '/api/banner',
            success: function({
                data
            }) {

                let row;
                data.map(function(val, index) {
                    row += `
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th><img src="/uploads/${val.image}" width="150"></th>
                        <th>
                        <button id="btn-hapus" data-id="${val.id}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Hapus</button>
                            </th>
                        </tr>
                        `;
                });

                $('tbody').append(row)
            }
        })

        $(document).on('click', '#btn-hapus', function() {
            const id = $(this).data('id')
            const token = localStorage.getItem('token')

            const confirm_dialog = confirm('Yakin menghapus data ini?');

            if (confirm_dialog) {
                $.ajax({
                    url: '/api/banner/' + id,
                    type: "DELETE",
                    headers: {
                        "Authorization": token
                    },

                    success: function(data) {
                        if (data.success) {
                            alert('Data berhasil dihapus')
                            location.reload()
                        }
                    }
                });
            }
        })

        $('#modal-tambah').click(function() {
            $('.form-banner').submit(function(e) {
                e.preventDefault()
                if (!this.image.value) {
                    alert('Gambar is required')
                    return
                }

                const $form = $(this)
                const token = localStorage.getItem('token')
                const frmdata = new FormData(this);
                $.ajax({
                    url: 'api/banner',
                    type: 'POST',
                    data: frmdata,
                    cache: false,
                    contentType: false,
                    processData: false,
                    headers: {
                        "Authorization": token
                    },
                    success: function(data) {
                        if (data.success) {
                            alert('data berhasil ditambah')
                            location.reload()
                        }
                    }
                })
            });
        });
    });
</script>p