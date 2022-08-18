<div class="form-group row" xmlns:wire="http://www.w3.org/1999/xhtml">
    <div class="form-group col-10 pt-4">
        <select name="to[]" class="form-control select2" multiple="multiple" data-placeholder="ارسال به :"
                style="width: 100%;text-align: right">
            @foreach($contacts as $contact)
                <option value="{{$contact->id}}">{{$contact->department->label}}: {{$contact->name}}&nbsp;&nbsp;&nbsp;<{{$contact->role->label}}></option>
            @endforeach
        </select>
    </div>

    <div class="col-2 form-control">
        <input wire:model="target" value="admins" type="radio"> <span>نمایش مدیران</span>
        <input wire:model="target" value="all" type="radio"> <span>نمایش همه</span><br>

    </div>
    @error('to')
    <p class="text-danger mt-2">{{$message}}</p>
    @enderror

    @section('js')
        <!-- Select2 -->
        <script src="{{asset('plugins/select2/select2.full.min.js')}}"></script>

        <script>
            $(function () {
                //Initialize Select2 Elements
                window.loadSelect2 = () => {
                    $('.select2').select2()
                }
                loadSelect2();
                window.livewire.on('select2Hydrate', () => {
                    loadSelect2();
                });
            })
        </script>

        <!-- iCheck -->
        <script src="{{asset('../../plugins/iCheck/icheck.min.js')}}"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="{{asset('../../plugins/ckeditor/ckeditor.js')}}"></script>

        <!-- Page Script -->
        <script>

            $('#attachment').change(function () {
                let i = $(this).next('label').clone();
                let file = $('#attachment')[0].files[0].name;
                let mb = 1048576;
                if (this.files[0].size > 32 * mb) {
                    alert("فال ضمیمه نباید بیشتر از 32 مگابایت باشد!");
                    this.value = "";
                } else {
                    $(this).next('label').text(file);
                }
            });

            $(function () {
                ClassicEditor
                    .create(document.querySelector('#compose-textarea'))
                    .then(function (editor) {
                        // The editor instance
                    })
                    .catch(function (error) {
                        console.error(error)
                    })
            })
            let element = document.getElementById('write');
            let tree = document.getElementById('messages');
            element.classList.add('active');
            tree.classList.add('menu-open');
            tree.children[0].style.background = '#007bff';
        </script>
    @endsection
</div>
