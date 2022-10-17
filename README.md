# InfoneteGrupo3

## Enunciado
### Descripción general del sistema
Debido a la actual pandemia, la empresa “InfoNete s.a.” está incursionando en el
mundo de las noticias digitales, llevando sus diarios y revistas a la web. Dado que
la misma no posee un departamento de desarrollo de sistemas, va a contratarnos
para desarrollar la plataforma que les permita publicar sus medios de comunica-
ción, administrarlos fácilmente y poseer un buen control y generación de reportes
aún mejor que el que poseen los medios físicos, facilitando el análisis del producto
4
en tiempo real, por ejemplo, la cantidad de personas que observa una noticia, en-
tre otros reportes e información que sólo la web nos puede facilitar.
Nuestro cliente nos solicita NO utilizar un gestor de contenidos, tal como Drupal o
Joomla, ya que desea escalar el sistema a lo largo del tiempo y prefiere que el
mismo sea de código propio. Por lo cual, nos veremos obligados a programar el
sistema sin utilizar uno de estos frameworks.
Como detalles técnicos extras, el cliente desea que trabajemos sobre servidores
Linux con lenguaje de programación PHP por parte del servidor y bases de datos
MySql para almacenar los datos (De más está decir que las claves de los usuarios
deben ser almacenadas como mínimo en MD5), ya que confía en estas tecnolo-
gías y su departamento de arquitectura posee experiencia en las mismas (Además
de evitar tener que pagar licencias y mantener su filosofía de difusión libre de la in-
formación, por lo que apoya los proyectos OpenSource). Respecto al código,
como el mismo, por contrato, le pertenece, desea que el desarrollo del mismo se
realice sobre un sistema de versionado GIT, donde pueda ver el avance del
mismo, y participar en él con el equipo de programadores que vayan agregando,
en caso de que creen su departamento de desarrollo, para lo mismo solicita que el
código sea almacenado en la plataforma GitLab o GitHub.


El gerente de InfoNete nos comenta que su intención es que en la primera versión
del sistema puedan contar con al menos tres tipos diferentes de usuarios:

* Lectores y suscriptores: Los cuales podrán pagar un número de la re-
vista/diario o suscribirse al mismo en forma mensual. Este tipo de usuario
podrá visualizar las noticias y descargarlas en formato PDF.
* Contenidistas: Que serán las personas que generarán el contenido, carga-
rán las noticias a cada edición de la revista/diario.
* Administrador y generador de reportes (Inicialmente agrupará estos tipos de
usuario para simplificar el desarrollo): El cual deberá poder realizar ABM de
los contenidistas y noticias y tener una visión general de la plataforma, con
reportes que permitan tomar decisiones sobre el producto.

Se debe tener en cuenta que, si bien inicialmente serán tres tipos de usuarios, a
futuro la cantidad de roles crecerá y debe ser escalable en el sistema.

El cliente ha dejado claro que la posibilidad de acceso a su contenido a través de
dispositivos móviles debe ser prioridad y por lo tanto al interfaz debe responder
tanto a Equipos de escritorio como a dispositivos móviles

### Detalle de funcionalidades

Nuestro encargado de ventas y un analista en sistemas del sector de ventas (el
cual es principiante), fueron a visitar al cliente para cerrar el contrato, por lo cual
poseemos un análisis inicial de las funcionalidades, y deberemos profundizar en
las mismas en las próximas visitas con el cliente, las cuales se acordaron los lunes
y martes de 19 a 23. La buena noticia es que fuimos contratados para llevar a
5
cabo el desarrollo del producto. A continuación, detallaremos la información que
pudo absorber nuestro analista:

###  Rol Lector - Casos de uso principales:

* El sistema debe permitir que el usuario se registre cargando sus datos per-
sonales, un correo electrónico, contraseña y ubicación de residencia (desde
un mapa de Google o de here.com), el registro deberá pedir confirmación
por email.
* El sistema debe permitir realizar login al usuario.
* El usuario debe poder visualizar un catálogo de productos (revistas y dia-
rios)
* El sistema debe permitir suscribirse a un producto mensualmente, desuscri-
birse, o abonar un número de la revista o diario en particular (a través de
MercadoPago y de ser posible a través de un código QR)
* El sistema debe permitir que el usuario visualice las noticias / revistas por
las que ha pagado.
* El usuario debe poder imprimir en PDF el resumen de suscripciones o pa-
gos del periodo de tiempo seleccionado.
* El usuario debe poseer una vista donde encuentre fácilmente los productos
que posee.
* El sistema debe mostrar en la pantalla principal el pronóstico del clima
como muestra la competencia (El clima será consultado a un WebServer
externo a nuestro sistema).
* El usuario podrá localizar el lugar geográfico de la noticia mediante un
mapa en línea (Se requiere utilizar mapas de Google o de here.com)

### Rol Contenidista - Casos de uso principales:

* El sistema debe permitir que el contenidista se loguee con usuario y contra-
seña (el mismo será creado por el administrador de sistema)
* El contenidista tiene que poder crear una revista o diario.
* El contenidista tiene que poder crear secciones dentro del diario o revista
* El contenidista tiene que poder crear una edición de una revista o diario
dado
* El contenidista debe georeferenciar la noticia de manera que el suscriptor
pueda observar en un mapa el lugar de ocurrencia de la misma. (Se re-
quiere utilizar mapas de Google o de here.com)
6
* El contenidista tiene que poder crear noticias para una sección de revista o
diario, cada noticia debe poseer al menos un título, subtítulo, una imagen o
varias y el contenido. Como datos opcionales permitir agregar un link a ma-
yor información o un video que debe poder visualizarse dentro de la misma
página web.
* El contenidista debe poder tomar una foto/video directamente desde el sitio
y asociarla a una noticia.
* El contenidista debe poder grabar un audio desde una noticia y asociarlo di-
rectamente

### Rol Administrador y generador de reportes - Casos de uso principales:

* El sistema debe permitir loguearse al administrador
* El administrador debe poder realizar ABM sobre los componentes de
la revista, contenidistas y usuarios, ya que es el moderador del sitio.
* El administrador debe poder generar gráficos de torta con la cantidad
de productos vendidos en un periodo de tiempo, dividido por producto. (So-
licita utilizar Google Charts)
* El administrador debe poder visualizar un gráfico de barras que
muestre por cada día del periodo de tiempo seleccionado, cuantas suscrip-
ciones se realizaron (y en otro gráfico, cuántos productos se vendieron)
(Solicita utilizar Google Charts)
* El administrador debe poder generar una lista descargable a PDF
con:
  * Sus contenidistas y su información personal
  * Sus clientes y su información personal y producto adquirido
  * Sus productos con su información básica, cantidad de vendi-
    dos/suscritos y ediciones
