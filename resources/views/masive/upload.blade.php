<html>
    <form action="/upload-coti-and-inf-sgc-file" class="form-inline" enctype="multipart/form-data" method="POST">
        {{method_field('POST')}}

  {{csrf_field()}}
        <input multiple="" name="files_upload[]"  multiple="true" class="form-control"type="file">
            <button name="" type="submit">
                Subir
            </button>
        </input>
    </form>
</html>
