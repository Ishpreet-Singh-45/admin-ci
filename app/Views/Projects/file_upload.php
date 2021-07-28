
<?= $this -> extend('layout/main') ?>


<?php helper('form') ?>

<?= $this -> section('content') ?>

    <div class="container form-group mt-5" style="width: 800px;">
        <h1 class="text-center text-dark">Browse Your Files : </h1>
    <p>
        <?=
            form_open_multipart('', array(
                'id' => 'inputFiles',
                'class' => 'input-group mt-4'
            ))
        ?>
        <?=
            form_hidden('uri_id', $id)
        ?>	
        <?=
            form_upload(array(
                'name' => "files[]", // name of the array
                'id' => 'filesArray',
                'class' => 'form-control',
                'value' => 'Browse your files here...',
                'required' => 'required',
                'multiple' => 'multiple'
            ))
        ?>
        <?=
            form_submit('submit', 'Add Files', array(
                'class' => 'btn btn-success',
                'id' => 'submit'
            ));
            echo form_close();
        ?>
    </p>

    <a href="<?= PROJECT_EDIT . $id ?>" class="btn btn-secondary" id="cancel"><i class="bi bi-arrow-left me-2"></i>Go Back</a>
    <p id='allFiles'></p>

    <script type="text/javascript">
        /**
         * --------------------   Showing files in list format 
         */
        const fileSelector = document.getElementById('filesArray')
        fileSelector.addEventListener('change', function(event)
        {
            document.getElementById('allFiles').innerHTML = "<b>Files You added : <br></b>"
            var fileList = event.target.files;
            var i = 1;
            for(const file of fileList)
            {
                document.getElementById('allFiles').innerHTML += i + ') ' + file.name + '<br>';
                i++
            }
            
        });
    </script>
<?= $this -> endSection() ?>
							