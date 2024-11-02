import React, { useState, useEffect } from 'react';
import { Link, Head } from '@inertiajs/react';
import '../../../css/secciones.css';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { MdDelete } from "react-icons/md";
import { FiEdit } from "react-icons/fi";
import { FaCheck } from "react-icons/fa";

const IndexPageTable = ({ registros: initialRegistros }) => {
    const [registros, setRegistros] = useState(initialRegistros);
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
                const response = await fetch(`/asignaPreguntasTipo/${itemId}`, {
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

                setRegistros((prevItem) =>
                    prevItem.map((item) =>
                        item.id === itemId ? { ...item, estado: 0 } : item
                    )
                );
            } catch (error) {
                console.error(error.message);
            }
        }
    };

    const handleActive = async (itemId) => {
        const confirmActive = window.confirm('¿Estás seguro de que deseas activar este registro?');
        if (confirmActive) {
            try {
                const response = await fetch(`/asignaPreguntasTipo/active/${itemId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Content-Type': 'application/json',
                    },
                });

                if (!response.ok) {
                    alert('Ocurrió un error al realizar la operación. Inténtalo nuevamente.');
                    throw new Error('Error al activar el registro.');
                }

                setRegistros((prevItem) =>
                    prevItem.map((item) =>
                        item.id === itemId ? { ...item, estado: 1 } : item
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
                    Preguntas a Tipos de Asignación
                </h2>
            }
        >
            <Head title="Preguntas a Tipos de Asignación" />

            <div className="user-index p-6 bg-white shadow-sm sm:rounded-lg">
                <Link href="/asignaPreguntasTipo/create" className="add-button">
                    Agregar Nueva Asignación
                </Link>
                <br />
                <br />
                <table className="user-table">
                    <thead>
                        <tr>
                            <th className="px-4 py-2">ID</th>
                            <th className="px-4 py-2">Tipo Asignación</th>
                            <th className="px-4 py-2">Pregunta</th>
                            <th className="px-4 py-2">Estado</th>
                            <th className="px-4 py-2">Usuario Registro</th>
                            <th className="px-4 py-2">Usuario Actualiza</th>
                            <th className="px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        {registros.length > 0 ? (
                            registros.map(item => (
                                <tr key={item.id} className="border-t">
                                    <td className="px-4 py-2">{item.id}</td>
                                    <td className="px-4 py-2">{item.tipo_asignacion.descripcion}</td>
                                    <td className="px-4 py-2">{item.pregunta.pregunta}</td>
                                    <td className="px-4 py-2">{item.estado === 1 ? 'Activo' : 'Inactivo'}</td>
                                    <td className="px-4 py-2">{item.usuario_registro}</td>
                                    <td className="px-4 py-2">{item.usuario_actualiza}</td>
                                    <td className="px-4 py-2 btn-icon">
                                        {item.estado === 1 ? (
                                            <>
                                                <Link href={`/asignaPreguntasTipo/${item.id}`}>
                                                    <FiEdit className="edit-button" />
                                                </Link>
                                                <button onClick={() => handleDelete(item.id)}>
                                                    <MdDelete className="delete-button" />
                                                </button>
                                            </>
                                        ) : (
                                            <>
                                                <button onClick={() => handleActive(item.id)} aria-label="Activar registro">
                                                    <FaCheck className="active-button" />
                                                </button>
                                            </>
                                        )}
                                    </td>
                                </tr>
                            ))
                        ) : (
                            <tr>
                                <td colSpan="7" className="text-center px-4 py-2">No hay registros disponibles.</td>
                            </tr>
                        )}
                    </tbody>
                </table>
            </div>
        </AuthenticatedLayout>
    );
};

export default IndexPageTable;
