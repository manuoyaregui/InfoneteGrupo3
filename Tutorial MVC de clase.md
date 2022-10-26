# MVC de clase, funcionamiento
---

## Movimiento entre clases

1. Index

2. Router
    1. Url Helper

3. Controlador (default: execute)

4. Modelo
    1. método
    2. Database
        1. Consulta

5. Render (required: 'vista.mustache') + (optional + dataArray)

---

## Rutas

- localhost/módulo/acción
    - ejemplo --> localhost/login/procesarLogin


---


## Agregar Un Elemento

### Obligatorio

1. Crear un Controlador
    1. Debe tener un constructor e incluir el render
    2. Debe poseer al menos el método execute que renderice una vista, crear la vista.mustache en caso de que no exista

2. En Configuration.php:
    1. Crear un metodo llamado get*NombreElemento*Controller que siga el formato de los otros getController
    2. Incluir el controller

### Opcionales

1. Crear un Modelo
    1. Debe tener un constructor que pida una database
    2. En configuration.php
        1. Crear metodo get*NombreElemento*Model que siga el formato de los otros getModel
        2. Incluir el model
        3. Modificar el Controller del elemento para que pida el Model, y su respectivo método getController


---
## Mustache

- Variable
```
    {{nombreVariable}}
```

- Comentario
```
    {{!comentario, no se va a renderizar}}
```

- ForEach
```
    {{#array}}
        {{propiedad}}
        {{.}} -->item
    {{/array}}
```

- If boolean
```
    {{#Variable}}
        caso true
    {{/Variable}}
```

- Incluir otro template
```
    {{>header}}
```

---


