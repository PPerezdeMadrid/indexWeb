# indexWeb
Index.html para un servidor local

## Desarrollo
    1. Página de Login-Register
        - He creado una estructura de HTML con formularios para introducir los datos del usuario
        - He agragado un apartado de registro, en principio será disfuncional. Con el tiempo
          se buscarán dos objetivos: almacenar correos electrónicos de intrusos que quieran entrar
          y añadir un registro de verificado o no para permitir que dichas personas puedan entrar. 
        - Por razones estéticas he añadido un div trasero que a su vez se divide en dos secciones:
          "Regístrate" e "Inicia Sesión". Ambas harán una transición hacia los formularios. El objetivo
          es probar diferentes funciones de CSS. 
        - Para ocultar el formulario de Login mientras este el de Register, he utilizado JavaScript. 
          Para ello he jugado con el atributo "display: none/block "

    2. Página de Inicio
        - He comenzado utilizando el mismo sistema de CSS y HTML que index.html, el objetivo es 
          utilizar PHP. Solo servirá para servidores con la configuración de PHP habilitada. Para
          ello voy a utilizar XAMPP (Anteriormente me descargué apache únicamente, por ello opté por 
          XAMPP quees XAMPP es un paquete todo-en-uno que combina Apache, MySQL y PHP (y otras 
          herramientas) en un entorno de desarrollo fácil de instalar y configurar.)
        - El programa de PHP guarda el archivo en una carpeta llamada "archivos" en el servidor 

    3. Página de Error 
        - Es una página sencilla de HTML que muestra el error y ofrece un botón para volver al inicio. 
