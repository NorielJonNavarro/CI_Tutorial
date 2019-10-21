<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- <script type="text/javascript">
    $('document').ready(function() {
    function validate() {
                var username = $('#username').val();
                var password = $('#password').val();            
            
                $.ajax({
                    url: '<?= base_url()?>auths/authenticate',
                    method: 'POST',
                    data: {
                        login: 1,
                        username: username,
                        password: password
                    },
                    
                    success: function(response){
                        if(response.indexOf('success') >= 0){
                            document.location.reload(true);
                        }else{
                            $('#validate').html(response);
                        }
                    },
                });
            }

    $("input").keypress(function() {
        if (event.which == 13){ 
            validate();
        }
    });

    $('#submit').click(validate);
});
</script> -->