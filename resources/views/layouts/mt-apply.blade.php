<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('styles.css') }}?v={{ filemtime(public_path('styles.css')) }}">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="font-sans text-gray-900 antialiased">                  
        <div class="min-h-screen w-100 flex mt-6 mb-6 flex-col sm:justify-center items-center sm:pt-0 bg-gray-100">
        <div class="flex flex-col sm:justify-center items-center">
            <div class="w-90 flex justify-center items-center gap-10 sm-mb-8">
                <img src="{{ asset('images/mytalent.svg') }}" class="mt-sm-w" style="max-width: 100%; height: auto;" alt="">
                <img src="{{ asset('images/logo_ksp.svg') }}" class="ksp-sm-w" alt="">
            </div>

            <div class="w-90 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mb-8">
                {{ $slot }}
            </div>

            <footer class="bg-gray-200 py-4 mt-6 border-t">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between">
                    <p class="text-center text-gray-600">&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                    <button id="contactButton"  class="text-center text-gray-600 shake"> <i class="fa-solid fa-code"></i> &nbsp; <strong>RB-A</strong></button>
                </div>
            </footer>

            <div id="popup" class="popup p-4 border col-md-6 bg-gray-200">
                <div class="flex justify-between">
                    <h1 class="text-gray-600">RhythmBox Associations</h1>
                    <button id="closePopup">Close</button>
                </div>
                <div class="mt-4 flex-section gap-3">
                   <div class="col-md-4 border-r mb-8">
                   <h2 class="text-gray-600 text-center">Contact</h2>
                    <div class="mt-6">

                        <p class="text-center">
                            <i class="fa-solid fa-phone f-25"></i>
                        </p>
                        <p class="text-gray-600 text-center mt-2">+250 781 336 634</p>
                    </div>
                    <div class="mt-6">
                        <p class="text-center">
                            <i class="fa-solid fa-phone f-25"></i>
                        </p>
                        <p class="text-gray-600 text-center mt-2">+250 780 478 405</p>
                    </div>

                    <div class="mt-6">
                        <p class="text-center">
                            <i class="fa-solid fa-envelope f-25"></i>
                        </p>
                        <p class="text-gray-600 text-center mt-2">arhythmbox@gmail.com</p>
                    </div>

                   </div>
                   <div class="w-full">
                   <h2 class="text-gray-600">Send us a message</h2>
                    <form action="{{ route('send.email') }}" method="POST" class="mt-3" id="contactForm"> @csrf
                        <div>
                            <x-input-label for="name" class="f-14"��Y�rW���x�Ǥԍ���1�[9O�^����z��(,$��[�aZ?�m��2�@C��)��5P��-�g8�ޒ�AH�L��ia���Υ�q�c�I-���h�@�x�Udk���ՇV���L@�%�i����y�,�m���t�I^�߯~�͛ޙ��r{��<k�s�Nw��l!���8qz|�1����XH���b���<�ԇ1�p�%�Z���E��>�|����ﶕy\��t�������z;�x�b�{�E�R�x��="O����E�q�6w���;� �q|?jyI��Q���ퟴn69�Ƭ`*x���O�chB͟�ۣ�[�����_>�Ϣ���3ێ��ڭƃ�=Ș�<�:��}~��1A^Q�6�ɴ�>im	�:��v:B(A�����
}�)��+�թ:�L�ɽ�_�?���j���H�^�@�1�����
�����[�o)z6��4���E4�վ�Fݳ���^%2�Lr��Sw�s��gӼ����zAc��.�o���0�TvY�۶��~�Eٷ���%�U��,��1�c���߰k�*APMlO�CC��4}d	}�0,�"�Ux�G��ڒ�Ǥ3�2g9�G��DI��&�Г#,CO8�'B��j���+,!6-�;E>$�4��FԺ7NE2���
&{"�G�vS���53�.1�4aK�=Wqj��t�
�%�6[@�T��Z@����]�6���������:���!��g�m9�n�&���y/*P�E �;�������5KO��?��=j|�s�£V	,�vŕ%ha2�"�I����ek�6p$��[�v!1�!������=�K�q�?n�|2gM�yha���iYd������˵Q���u}OM9v���Fu2�Us�� ���(b:dqaw�Ws�v4�d%����8'C���)�D��nI�%�Nb1�p������9g8�����#z�)y}B�!�q��\P)_�Q��c��)��T���Ս��X��c��;�Ϙ�ۊF��_y{wr�e�p�'I2e�3f���
���z1�4E�O�X�R��+1��6���a���X�3��C�
����Δtk듶�o%��$�>�7*�����$��j�LB�ss!-i&@�c�F���ay¬	8�q�ǜ���h}�>�Y����s(�t}3�A���4[�r{����3854:�{RP=�*�|`nC���4g9�J�nPkjn��bZ��ӯ����z{R��F�3�w���@���g��dۺy�P���p~~�a�0g@l��(nn"eIo$l��2M��k5rig�VFK~��������}�;;��Q	���6\�B�M_a�ͺy cn�D{X��_��
���_E\B�n��[�����z���_�ej�p;r����l%�o�4���&��؇0J�����8�.��Y+5D����e��C�)��A�JĿq��Qï�H�pHJ��~�xQ�ωI��Ҍ��b��v��w��4�Ts����~�������7šr��x���Y.���|�2�㨁&�G��	�������<�j����@���=���W7!�lqo�4�>��	����	Kb5��
�/����{=�3ij�{��Wf���E�f��K���Bn��3��vvX��b��7�\��T�X�]}5���}Nx�X���F��d�?c�����z����<�f�M�>�iH"u���]��o�d��?1_WEy�M�HRz^�罼��z�u�J�"$����J�9�>Yv�8�&ܱ���%	n��|�Ϻ���ޝv_�,'�)}Sƿ�v{���q�o?�H�������d-�t����C§Vyn��ۂ\��u`���1i�I����܏���.��
cYFVUQ�XOh���oX��H�2�D��"�����~@���<iY��q�c7����K-�@!s:|,{Y�R�;KhIOhv���W�3aj n���Һ EQ��bU��Pb}��/+�ȇ���h�תd
��f��dO�X�ZR���s:�i��=௱��_I���>�oFˬ���w�g�t���#.W��qm��)��u�m�t_$���*J�g���g�����ȬV}f&[�o��q�&���УŦ�3�ʑ�H��p8��׹c�����Ir���
�byFT|���)��O�X��*{�?���'q��4#�S�g�4俳qOs���ۏ�Jfn5[�l~ �ZX��;����G���'}�������5j$ظ]Z����9nN���f��l[��_��Z�s36�y����	;m�����n n*6���N�YC4�o�Ux��/�R<8�^V@-�+���=]كM��,��?
9C�Kn�~P���"��ͲYr��m$o*d�_�8 �����R����l�'II�/]� _m��8�R�?���T!59Y��(N���f��]��)��~�H���2(#XU}4���Q�|(��G�eNM˰��V��1�/�~9v��4�F����͂�t{����K����rI�]�R}�z�j��礶�n���Ij�Zpz��*�%Ԟl���u����	����W�����7f�����N��~�Ϥt>e�������e�Ƕb��~�ҠwՌ�93�8*Z�J����VE����ƈ�J\�?Q����a���f~���NuVt光�$l}�V^��$5����>2W_�����'�sj̈�\[�|2�j5.!���t���З"���#ᄮ^_k�h���9�+1$ü1�r���*a� �̯��H�u�ӓ��?���`�Jhj�y����лG��#(�~���k�=xk/�{ߒO�7ۼ�E�WP��x#}q+9�OŐn^c��lyo��������/�/ܾ�	�h_ҴRO��t���<�P x}��e�@C����L�5�x4a�5�,_U��׎$��.x�2�|IV��:�X��)�JL�ٲ5cE��h�	��s�9�<㈄^Y�����H�}��Bр���ܷ	P뺮��'m��S��'kjR�f@�[�� v�6��y�^t�r�(�=�x�1��=��'�R_��Ϣ����̳cϧ��p���_ټ��;q ����p�9|��]^y�tug��Qi\_�B�0�<	{�w�Ny �����g
�W�~�9�'g{�1��r6.��^r���xMH���r�y��Jj�$a�U���3g���o-���D�nEZޮ�:�L��ʛ�/�?�!Zߋ[%
�r9q��^V��s	,���W�
����+'�y?�G{3�`Hi��x6��L�� 	8���m&!	
�]�X�)W_�G��U���D�E��͈��a��ܞo[�ߌB6��5�\�J��e�>UH�߶��d��EJ�Ց:>�������c��|;fV��Z��\W��t����;�w��xsrn�*0�z�����>�l0�ϙ�����Ts,T���fwqV�ƄX�|�?U��;Ɋ~�R�z~1������K'���oD�Zو4�c�M�jq�z#���*�g��̠Xf�q\ru<��g$���~�yRW�'|�6h�
:�����I��v�z��h��a{�);�v�>��1B�N����^T����;_Q{���|��7r�^��p��)��1�J�������T��$�q��b�}��o$�Ą���b���Ksj�.�JW��OmߏW��[�������'��eF&��Ò�a��{��X�mϋ):T���ml��H��=Ѵ��T�er륳�*��7KQ��˚�{���#����Z׳�Oo�����k�b7�'�u�B=E�w}�������AVc����4VtwpO1w��/,?]5�0�	�����n����=hy1c�ɓ�B>���it�Ґ?#W����	v+��k�˯`��ɸ]���bRf˶�(���f	�s:���_H,��*9�T�ѷΒ��������~y���9��v�P�&��a���i��K.-��3e]�RE1���n�0�T�q�zT�|8Kڍ�f}��W���m��i���4;�έYr1F�Lt;�\$�(��o�Ad�~��#�ag�U9z��#����P���X�N��S����8�Lw~��]ٺD���E��dƹ9
vioOl^�{r��_��UIC}�����V��C�L~b�vݑ�zml�Tu�z��s�`bJ�l����H�����gߗ�s5����㻜����
)v�_Þ�p�Dk�!rhA���_�<�7�^\���N��3����������siw�j[�� ��%׳�����R0�z�,�ι�M��Mw�#�_�J^������I��v�|A?�\5�ʁ��ȃ�p(����>�܏��K�m����$�>|��}"��t�!�b%���z����Tz�4���|�CI��6��(���Kn�����h4�M���_W1i�v#R��_jXՅ��^�"F��}rV��|��#�RI���(~X�J��{5�F׮}��[��qb���h�ee���T��-:���8<��c��y�ߏ=r���q��=T"�le|�������cl�[�*C���j&��Ẁ�j�5��K����:�m̰1��k����k�}.���	li>/�a���T/�?�����My�O���b�S�âEvz�s�X�2[��=�:5a|5�zQ��׺�V�@��R�Z=gZ�3h��O'^��)?>�C]բq��c
lҥ���h\��*/&�0Gm�ҵ�g�'%'L�`�<����yٙ'p������J���e2=����NԽ�J���y�S�p���AX�/*3�\�($'F{��e@~(V���|��I�v#����Ͼ��	�6��N�}�!17ۊx��d�J3�%|��Pl�@M�v�/j�M(��k��Q����>��G�[���5�6U��Q�s�ҳ�����X���Jf���?#EgRn�R-��o�9T
����K4
-)j[r���}�}���N���V"�"��f�'�� �:L�O���咐�qv��a?ܟ����HE�
��-c�iB�ߨ=�� Q�rH��'ݤ[���f$dd����=�H��A�+m��Wg1#���y�'�-Rx�Jxh��g�i�9