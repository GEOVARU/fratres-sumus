import React from 'react';
import { Link, Head } from '@inertiajs/react';
import '../../../css/secciones.css'; // Archivo CSS para estilos
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';

const UserIndex = ({ users }) => {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const handleDelete = async (userId) => {
        const confirmDelete = window.confirm('¿Estás seguro de que deseas desactivar este usuario?');
        if (confirmDelete) {
            try {
                const response = await fetch(`/users/${userId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Content-Type': 'application/json',
                    },
                });

                if (!response.ok) {
                    throw new Error('Error al desactivar el usuario.');
                }

                // Aquí puedes manejar la respuesta, por ejemplo, actualizar el estado
                console.log(`Usuario con ID ${userId} desactivado.`);
            } catch (error) {
                console.error(error.message);
            }
        }
    };

    const formatDate = (dateString) => {
        const options = {
            day: '2-digit',
            month: '2-digit',
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
        };
        const date = new Date(dateString);
        return date.toLocaleDateString('es-ES', options).replace(',', '');
    };
    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Listado de Usuarios
                </h2>
            }
        >
            <Head title="Listado de Usuarios" />

            <div className="user-index p-6 bg-white shadow-sm sm:rounded-lg">

                <h1 className="text-2xl font-bold mb-4">Usuarios</h1>
                <Link
                    href="/users/create"
                    className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-md transition duration-300 ease-in-out transform hover:scale-105"
                >
                    Agregar Nuevo Usuario
                </Link>
                <br />
                <br />
                <table className="user-table">
                    <thead>
                        <tr>
                            <th className="px-4 py-2">Nombre Completo</th>
                            <th className="px-4 py-2">Usuario</th>
                            <th className="px-4 py-2">Telefono 1</th>
                            <th className="px-4 py-2">Correo Electrónico</th>
                            <th className="px-4 py-2">Identificacion</th>
                            <th className="px-4 py-2">Estado</th>
                            <th className="px-4 py-2">Actualizado</th>
                            <th className="px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        {users.length > 0 ? (
                            users.map(user => (
                                <tr key={user.id} className="border-t">
                                    <td className="px-4 py-2">{user.primer_nombre} {user.segundo_nombre}  {user.otros_nombres}    {user.primer_apellido} {user.segundo_apellido}</td>
                                    <td className="px-4 py-2">{user.usuario}</td>
                                    <td className="px-4 py-2">{user.telefono_1}</td>
                                    <td className="px-4 py-2">{user.correo_electronico}</td>
                                    <td className="px-4 py-2">{user.identificacion}</td>
                                    <td className="px-4 py-2">{user.condicion === 1 ? 'Activo' : 'Inactivo'}</td>
                                    <td className="px-4 py-2">{formatDate(user.updated_at)}</td>

                                    <td className="px-4 py-2">
                                        <Link
                                            href={`/users/${user.id}`} // Usar el ID del usuario en la URL
                                            className="edit-button bg-blue-500 text-white px-2 py-1 rounded mr-2"
                                        >
                                            Editar
                                        </Link>

                                        <button
                                            className="delete-button bg-red-500 text-white px-2 py-1 rounded"
                                            onClick={() => handleDelete(user.id)}
                                        >
                                            Desactivar
                                        </button>
                                    </td>
                                </tr>
                            ))
                        ) : (
                            <tr>
                                <td colSpan="5" className="text-center px-4 py-2">No hay usuarios disponibles.</td>
                            </tr>
                        )}
                    </tbody>
                </table>
            </div>
        </AuthenticatedLayout>
    );
};

export default UserIndex;
