import React, { useState, useEffect } from 'react';
import axios from 'axios';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Link, Head } from '@inertiajs/react';
import '../../../css/secciones.css';

const AsignacionesTable = () => {
    const [asignaciones, setAsignaciones] = useState([]);

    useEffect(() => {
        // Cargar los datos de asignaciones desde el backend
        axios.get('/api/asignaciones')
            .then(response => {
                setAsignaciones(response.data.asignaciones);
            })
            .catch(error => {
                console.error('Error al cargar las asignaciones:', error);
            });
    }, []);

    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Asignaciones
                </h2>
            }
        >
            <Head title="Asignaciones" />

            <div className="user-index p-6 bg-white shadow-sm sm:rounded-lg">
                <Link href="/asignaciones/create" className="add-button">
                    Agregar Nuevo Usuario
                </Link>
                <br />
                <br />
                <table className="user-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Usuario Interesado</th>
                            <th>Usuario Asignado</th>
                            <th>Hora Inicio</th>
                            <th>Minuto Inicio</th>
                            <th>Hora Fin</th>
                            <th>Minuto Fin</th>
                            <th>Día de la Semana</th>
                            <th>Año</th>
                            <th>Estado</th>
                            <th>Tipo de Asignación</th>
                            <th>Usuario Registro</th>
                            <th>Usuario Actualiza</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        {asignaciones.map(asignacion => (
                            <tr key={asignacion.id}>
                                <td>{asignacion.id}</td>
                                <td>{asignacion.interesado ? asignacion.interesado.usuario : 'N/A'}</td>
                                <td>{asignacion.asignado ? asignacion.asignado.usuario : 'N/A'}</td>
                                <td>{asignacion.hora_inicio}</td>
                                <td>{asignacion.minuto_inicio}</td>
                                <td>{asignacion.hora_fin}</td>
                                <td>{asignacion.minuto_fin}</td>
                                <td>{asignacion.diaSemana ? asignacion.diaSemana.nombre : 'N/A'}</td>
                                <td>{asignacion.anio}</td>
                                <td>{asignacion.estado === 1 ? 'Activo' : 'Inactivo'}</td>
                                <td>{asignacion.tipoAsignacion ? asignacion.tipoAsignacion.descripcion : 'N/A'}</td>
                                <td>{asignacion.usuario_registro}</td>
                                <td>{asignacion.usuario_actualiza}</td>
                                <td>
                                    <button onClick={() => handleEdit(asignacion.id)}>Editar</button>
                                    <button onClick={() => handleDelete(asignacion.id)}>Eliminar</button>
                                </td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
        </AuthenticatedLayout>

    );
};

// Funciones de ejemplo para manejar las acciones de edición y eliminación
const handleEdit = (id) => {
    // Lógica para editar la asignación con el ID proporcionado
    console.log('Editar asignación con ID:', id);
};

const handleDelete = (id) => {
    // Lógica para eliminar la asignación con el ID proporcionado
    console.log('Eliminar asignación con ID:', id);
};

export default AsignacionesTable;
