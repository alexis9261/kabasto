@extends('layouts.app')

    @section('title')
        Politicas de privacidad - Kabasto.com
    @endsection

    @section('header')
        {{-- precargar imagenes --}}
        <link rel="preload" href="{{ asset('home.png') }}" as="image">

        <meta name="robots" content="index,follow"/>

        <!-- Primary Meta Tags -->
        <meta name="title" content="Kabasto.com -  Políticas de privacidad de la plataforma">
        <meta name="description" content="Kabasto.com - Lee nuestras políticas de privacidad, e informate sobre nuestro compromiso con la seguridad de todos tus datos.">
        <meta name="keywords" content="terminos y condiciones de kabasto">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://kabasto.com/politicas-de-privacidad">
        <meta property="og:title" content="Kabasto.com -  Políticas de privacidad de la plataforma">
        <meta property="og:description" content="Kabasto.com - Lee nuestras políticas de privacidad, e informate sobre nuestro compromiso con la seguridad de todos tus datos.">
        <meta property="og:image" content="{{ asset( 'home.webp' ) }}">

        {{-- url canonical --}}
        <link rel="canonical" href="https://kabasto.com/politicas-de-privacidad" />
    @endsection


@section('content')
    <div class="max-w-7xl w-full shadow rounded-md p-6 md:px-10 bg-white my-4 mx-auto">

        <div class="w-full text-center grid grid-cols-3">
            <div class="hidden md:block md:col-span-1 w-full my-5">
                <img class="mx-auto" src="{{ asset('privacy.svg') }}" alt="imagen de piliticas de privacidad" width="75%">
            </div>
            <div class="col-span-3 md:col-span-2 text-left">
                <small class="text-gray-500">Última actualización Junio 2021</small>
                <h1 class="text-3xl font-semibold">POLÍTICA DE PRIVACIDAD</h1>
                <span class="text-gray-700">
                    El presente Política de Privacidad establece los términos en que Kabasto.com usa y protege la
                    información que es proporcionada por sus usuarios al momento de utilizar su sitio web.
                </span>
                <p class="text-gray-700">
                    <br>
                    Esta plataforma está comprometida con la seguridad de los datos de sus usuarios.
                    Cuando le pedimos llenar los campos de información personal con la cual usted pueda ser identificado,
                    lo hacemos asegurando que sólo se empleará de acuerdo con los términos de este documento.
                    Sin embargo esta Política de Privacidad puede cambiar con el tiempo o ser actualizada por lo que le recomendamos
                    y enfatizamos revisar continuamente esta página para asegurarse que está de acuerdo con dichos cambios.
                </p>
            </div>
        </div>

        <hr class="my-6">


        <h2 class="text-lg mt-2 font-semibold">
            Información que es recogida
        </h2>

        <p>
            Nuestro sitio web podrá recoger información personal por ejemplo:
            Nombre, Razón social, Rif o documentos de identidad,
            información de contacto como su dirección de correo electrónica e información demográfica.
            Así mismo cuando sea necesario podrá ser requerida información específica para procesar
            algún pedido o realizar una entrega o facturación.
        </p>

        <hr class="my-6">

        <h2 class="text-lg mt-2 font-semibold">
            Uso de la información recogida
        </h2>

        <p>
            Nuestro sitio web emplea la información con el fin de proporcionar el mejor servicio posible,
            particularmente para mantener un registro de usuarios, de pedidos en caso que aplique,
            y mejorar nuestros productos y servicios.
            Es posible que sean enviados correos electrónicos periódicamente a través de nuestro sitio con ofertas
            especiales, nuevos productos y otra información publicitaria que consideremos relevante para usted
            o que pueda brindarle algún beneficio, estos correos electrónicos serán enviados a la dirección
            que usted proporcione y podrán ser cancelados en cualquier momento.
        </p>

        <p>
            Kabasto.com está altamente comprometido para cumplir con el compromiso de mantener su información segura.
            Usamos los sistemas más avanzados y los actualizamos constantemente para asegurarnos que no exista
            ningún acceso no autorizado.
        </p>

        <hr class="my-6">

        <h2 class="text-lg mt-2 font-semibold">
            Cookies
        </h2>
        <p>
            Una cookie se refiere a un fichero que es enviado con la finalidad de solicitar permiso para almacenarse
            en su ordenador, al aceptar dicho fichero se crea y la cookie sirve entonces para tener información respecto
            al tráfico web, y también facilita las futuras visitas a una web recurrente.
            Otra función que tienen las cookies es que con ellas las web pueden reconocerte individualmente y
            por tanto brindarte el mejor servicio personalizado de su web.
        </p>
        <p>
            Nuestro sitio web emplea las cookies para poder identificar las páginas que son visitadas
            y su frecuencia.
            Esta información es empleada únicamente para análisis estadístico y después la información se
            elimina de forma permanente. Usted puede eliminar las cookies en cualquier momento desde su ordenador.
            Sin embargo las cookies ayudan a proporcionar un mejor servicio de los sitios web,
            estás no dan acceso a información de su ordenador ni de usted, a menos de que usted así lo quiera
            y la proporcione directamente.
            Usted puede aceptar o negar el uso de cookies, sin embargo la mayoría de navegadores aceptan cookies
            automáticamente pues sirve para tener un mejor servicio web.
            También usted puede cambiar la configuración de su ordenador para declinar las cookies.
            Si se declinan es posible que no pueda utilizar algunos de nuestros servicios.
        </p>

        <hr class="my-6">

        <h2 class="text-lg mt-2 font-semibold">
            Enlaces a Terceros
        </h2>

        <p>
            Este sitio web pudiera contener en laces a otros sitios que pudieran ser de su interés.
            Una vez que usted de clic en estos enlaces y abandone nuestra página,
            ya no tenemos control sobre al sitio al que es redirigido y por lo tanto no somos responsables de
            los términos o privacidad ni de la protección de sus datos en esos otros sitios terceros.
            Dichos sitios están sujetos a sus propias políticas de privacidad por lo cual es
            recomendable que los consulte para confirmar que usted está de acuerdo con estas.
        </p>

        <hr class="my-6">

        <h2 class="text-lg mt-2 font-semibold">
            Control de su información personal
        </h2>
        <p>
            En cualquier momento usted puede restringir la recopilación o el uso de la información personal
            que es proporcionada a nuestro sitio web.
            Cada vez que se le solicite rellenar un formulario, como el de alta de usuario,
            puede marcar o desmarcar la opción de recibir información por correo electrónico.
            En caso de que haya marcado la opción de recibir nuestro boletín o publicidad usted puede
            cancelarla en cualquier momento.
        </p>
        <p>
            Esta plataforma no venderá, cederá ni distribuirá la información personal que es recopilada
            sin su consentimiento, salvo que sea requerido por un juez con un orden judicial.
        </p>

        <p>
            Kabasto.com Se reserva el derecho de cambiar los términos de la presente Política de Privacidad en
            cualquier momento.
        </p>

    </div>

@endsection

