import React, { useState, useEffect } from 'react';
import { Link, Head } from '@inertiajs/react';
import '../../../css/secciones.css';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { MdDelete } from "react-icons/md";
import { FiEdit } from "react-icons/fi";
import { TbReportSearch } from "react-icons/tb";
import { TbReport } from "react-icons/tb";
import { TbReportAnalytics } from "react-icons/tb";
const AsignacionesTable = ({ asignaciones: inixialAsignaciones }) => {
    const [asignaciones, setAsignaciones] = useState(inixialAsignaciones);
    const [csrfToken, setCsrfToken] = useState(null);

    useEffect(() => {
        const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        if (token) {
            setCsrfToken(token);
        }
    }, []);

    const handleDelete = async (itemId) => {
        const confirmDelete = window.confirm('¿Estás seguro de que deseas eliminar este registro?');
        if (confirmDelete) {
            try {
                const response = await fetch(`/asignaciones/${itemId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Content-Type': 'application/json',
                    },
                });

                if (!response.ok) {
                    alert('Ocurrió un error al realizar la operación. Inténtalo nuevamente.');
                    throw new Error('Error al desactivar el registro.');
                }

                // Actualiza la lista de usuarios en el frontend
                setAsignaciones((prevItem) =>
                    prevItem.map((item) =>
                        item.id === itemId ? { ...item, estado: 0 } : item
                    )
                );
            } catch (error) {
                console.error(error.message);
            }
        }
    };
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
                            <th className="px-4 py-2">ID</th>
                            <th className="px-4 py-2">Usuario Asignado</th>
                            <th className="px-4 py-2">Inicio</th>
                            <th className="px-4 py-2">Fin</th>
                            <th className="px-4 py-2">Día de la Semana</th>
                            <th className="px-4 py-2">Año</th>
                            <th className="px-4 py-2">Estado</th>
                            <th className="px-4 py-2">Tipo de Asignación</th>
                            <th className="px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        {asignaciones.length > 0 ? (
                            asignaciones.map(item => (
                                <tr key={item.id} className="border-t">
                                    <td className="px-4 py-2">{item.id}</td>
                                    <td className="px-4 py-2">{item.interesado ? item.interesado.usuario : 'N/A'}</td>
                                    <td className="px-4 py-2">{item.hora_inicio > 9 ? item.hora_inicio : '0' + item.hora_inicio}:{item.minuto_inicio > 9 ? item.minuto_inicio : '0' + item.minuto_inicio}</td>
                                    <td className="px-4 py-2">{item.hora_fin > 9 ? item.hora_fin : '0' + item.hora_fin}:{item.minuto_fin > 9 ? item.minuto_fin : '0' + item.minuto_fin}</td>
                                    <td className="px-4 py-2">{item.dia_semana ? item.dia_semana.nombre : 'N/A'}</td>
                                    <td className="px-4 py-2">{item.anio}</td>
                                    <td className="px-4 py-2">{item.estado === 1 ? 'Activo' : 'Inactivo'}</td>
                                    <td className="px-4 py-2">{item.tipo_asignacion ? item.tipo_asignacion.descripcion : 'N/A'}</td>
                                    <td className="px-4 py-2 btn-icon">
                                        {item.estado === 1 && (
                                            <>
                                                <Link href={`/asignaciones/${item.id}`}>
                                                    <TbReportSearch className="edit-button" />
                                                </Link>
                                                <Link href={`/asignaciones/${item.id}`}>
                                                    <TbReport className="show-button" />
                                                </Link>
                                                <Link href={`/asignaciones/${item.id}`}>
                                                    <TbReportAnalytics  className="active-button" />
                                                </Link>
                                            </>
                                        )}
                                    </td>
                                </tr>
                            ))
                        ) : (
                            <tr>
                                <td colSpan="14" className="text-center px-4 py-2">No hay asignaciones disponibles.</td>
                            </tr>
                        )}
                    </tbody>
                </table>
            </div>
        </AuthenticatedLayout>

    );
};


export default AsignacionesTable;
