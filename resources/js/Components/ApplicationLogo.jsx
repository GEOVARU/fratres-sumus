import React from 'react';

export default function ApplicationLogo(props) {
    return (
        <img
            {...props}
            src="/img/fundacion_fs.png" // Ruta relativa a la raíz del servidor
            alt="Fundación FS" // Agrega un atributo alt para accesibilidad
        />
    );
}
