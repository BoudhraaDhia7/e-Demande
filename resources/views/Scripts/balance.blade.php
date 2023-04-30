<script type="text/javascript">
    var userRole = {{ Auth::user()->role }};

    window.addEventListener('load', function() {
        console.log('userRole:', userRole);

        var parentInit = $('.hidden-parent').val()
        var chilInit = $('.hidden-child').val()
        console.log('init', {
            parentInit,
            chilInit
        });

        var somme = 0
        $('.plus').click(function() {
            var myInput = $('.nbalance').val();

            if(+myInput < 0 ) {
                alert('Balance doit etre positif');
                $('.nbalance').val(000)
                return;
            }

            var result = $('.changedbalance').val();
            somme = somme + +myInput

            if (userRole == 1) {
                plus = +myInput + +result
                $('.changedbalance').val(plus);
            } else {
                if (somme > parentInit) {
                    $('.alerty').removeClass('alert-warning');
                    $('.alerty').addClass('alert-danger');
                    $('.alerty').text('Vous avez dépasser la limite');
                    somme = somme - +myInput
                } else {
                    plus = +myInput + +result
                    $('.changedbalance').val(plus);
                    result = plus
                    $('.alerty').removeClass('alert-danger')
                    $('.alerty').addClass('alert-warning')
                    $('.alerty').text('Attention : il faut pas depasser la limite')
                }
            }

            $('.nbalance').val(0)
        })

        $('.minus').click(function() {
            var inpBal = $('.nbalance').val()

            if(+inpBal < 0 ) {
                alert('Balance doit etre positif');
                $('.nbalance').val(000)
                return;
            }


            var oldBal = $('.changedbalance').val()
            var plus = +oldBal - +inpBal;
            $('.changedbalance').val(plus);
            adbalance = $('.hidden-parent').val();
            if (+adbalance > plus) {
                if (userRole != 1) {
                    $(".dis").prop("disabled", false);
                    $('.alerty').removeClass('alert-danger');
                    $('.alerty').addClass('alert-warning');
                    $('.alerty').text('Attention : il faut pas depasser la limite');
                }
            }

            if (+plus < 0) {
                if (userRole != 1) {
                    $('.alerty').removeClass('alert-warning')
                    $('.alerty').addClass('alert-danger')
                    $('.alerty').text('Solde ne peut pas etre négative')
                    $(".dis").prop("disabled", true);
                } else {
                    $('.changedbalance').val(0);
                }
            }

            $('.nbalance').val(0)
        })

        $('.confirmer').click(function() {
            var oldBal = $('.changedbalance').val()
            var adbalance = $('.hidden-parent').val()
            var agbalance = $('.hidden-child').val()
            if (userRole != 1) {
                $('.resParent').val(+adbalance - +oldBal + +agbalance);
                $('.changeParent').text(+adbalance - +oldBal + +agbalance + " DT");
            }

            $('.resChild').val(+oldBal);
            $('.changeChild').text(+oldBal + " DT");
        })

        $('.reset').click(function() {
            location.reload();
        });


    })

</script>
