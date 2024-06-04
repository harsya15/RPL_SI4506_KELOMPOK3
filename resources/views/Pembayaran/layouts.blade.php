<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <style>
        .badan{
        width:100vw;
        height:100vh;
        display:flex;
        align-items:center;
        justify-content:center;
        background:radial-gradient(circle at 75% 50%, #BFDCE5 25%, #F5E9CF 75%);
        } 
        button.btn {
            background-color:#2B3467;
            color:white;
            height:42px;
        }
        button.btn:hover{
            background-color:#3E54AC;
            color:white;
            height:42px;
        }
        .modal-header {
            background-color: #2B3467;
            color: white;
        }
        .modal-header > button{
            color: white;
        }
        label.radio-card {
            cursor: pointer;
            margin: .5em;
        }
        label.radio-card .card-content-wrapper {
            background: #fff;
            border-radius: 5px;
            padding: 15px;
            box-shadow: 0 2px 4px 0 rgba(219, 215, 215, 0.04);
            transition: 200ms linear;
            position: relative;
            min-width: 170px;
        }
        label.radio-card .check-icon {
            width: 20px;
            height: 20px;
            display: inline-block;
            border-radius: 50%;
            transition: 200ms linear;
            position: absolute;
            right: -10px;
            top: -10px;
        }
        label.radio-card .check-icon:before {
            content: "";
            position: absolute;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg width='12' height='9' viewBox='0 0 12 9' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0.93552 4.58423C0.890286 4.53718 0.854262 4.48209 0.829309 4.42179C0.779553 4.28741 0.779553 4.13965 0.829309 4.00527C0.853759 3.94471 0.889842 3.88952 0.93552 3.84283L1.68941 3.12018C1.73378 3.06821 1.7893 3.02692 1.85185 2.99939C1.91206 2.97215 1.97736 2.95796 2.04345 2.95774C2.11507 2.95635 2.18613 2.97056 2.2517 2.99939C2.31652 3.02822 2.3752 3.06922 2.42456 3.12018L4.69872 5.39851L9.58026 0.516971C9.62828 0.466328 9.68554 0.42533 9.74895 0.396182C9.81468 0.367844 9.88563 0.353653 9.95721 0.354531C10.0244 0.354903 10.0907 0.369582 10.1517 0.397592C10.2128 0.425602 10.2672 0.466298 10.3112 0.516971L11.0651 1.25003C11.1108 1.29672 11.1469 1.35191 11.1713 1.41247C11.2211 1.54686 11.2211 1.69461 11.1713 1.82899C11.1464 1.88929 11.1104 1.94439 11.0651 1.99143L5.06525 7.96007C5.02054 8.0122 4.96514 8.0541 4.90281 8.08294C4.76944 8.13802 4.61967 8.13802 4.4863 8.08294C4.42397 8.0541 4.36857 8.0122 4.32386 7.96007L0.93552 4.58423Z' fill='white'/%3E%3C/svg%3E%0A");
            background-repeat: no-repeat;
            background-size: 12px;
            background-position: center center;
            transform: scale(1.6);
            transition: 200ms linear;
            opacity: 0;
        }
        label.radio-card input[type=radio] {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
        }
        label.radio-card input[type=radio]:checked + .card-content-wrapper {
            box-shadow: 0 2px 4px 0 rgba(219, 215, 215, 0.5), 0 0 0 2px #3057d5;
        }
        label.radio-card input[type=radio]:checked + .card-content-wrapper .check-icon {
            background: #3057d5;
            border-color: #3057d5;
            transform: scale(1.2);
        }
        label.radio-card input[type=radio]:checked + .card-content-wrapper .check-icon:before {
            transform: scale(1);
            opacity: 1;
        }
        label.radio-card input[type=radio]:focus + .card-content-wrapper .check-icon {
            box-shadow: 0 0 0 4px rgba(48, 86, 213, 0.2);
            border-color: #3056d5;
        }
        label.radio-card .card-content img {
            margin-bottom: 10px;
        }
        label.radio-card .card-content h4 {
            font-size: 16px;
            letter-spacing: -0.24px;
            text-align: center;
            color: #1f2949;
            margin: 0;
        }
        label.radio-card .card-content h5 {
            font-size: 14px;
            line-height: 1.4;
            text-align: center;
            color: #686d73;
        }
        .card-content > img{
            max-height:35px;
        }
        .modal-footer > button{
            width:50%;
            height:50px;
            border:0;
            color:#222;
        }
        .btn-outline-primary:hover {
            color: #fff;
            background-color: #2B3467!important;
        }

        .btn-outline-light:hover {
            color: #cecece!important;
        }

    </style>
</head>
<body>
    @yield('content')
</body>
<script>

    function handleRadioClick(radio) {
        var selectedValue = radio.value;
        window.localStorage.setItem('checked', selectedValue);
    }

    function test(id, nama, harga){
        var valueLocal  = localStorage.getItem("checked")
        console.log(valueLocal)
        $('input[name="radio-card"][value="' + valueLocal + '"]').prop('checked', true);

        
        $('#myModal').modal('show');
        $('.id_menu').val(id)
        $('.nama_menu').val(nama)
        $('.harga').val(harga)

        $('#harga_payment').empty()
        $('#harga_payment').append('Rp. '+harga)
    }

    function next(){
        var payment_method = $('input[name="radio-card"]:checked').val();

        if(payment_method == 'CC'){
            $('#myModalCC').modal('show');
        }else{
            $('#id_bank').empty()
            $('#id_bank').append('Bank '+payment_method)
            $('#id_bank_save').val(payment_method)
            
            $('#myModalBank').modal('show');
        }

    }
</script>
</html>