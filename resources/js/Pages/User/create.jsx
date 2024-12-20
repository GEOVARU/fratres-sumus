import React, { useEffect, useState } from 'react';
import { useForm } from '@inertiajs/react';
import '../../../css/secciones.css'; // Archivo CSS para estilos
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';

const CreateUser = ({ tiposUsuarios, pais, documento }) => {
    const { data, setData, post, processing, errors } = useForm({
        primer_nombre: '',
        segundo_nombre: '',
        otros_nombres: '',
        primer_apellido: '',
        segundo_apellido: '',
        tipo_documento_identificacion: '',
        identificacion: '',
        telefono_1: '',
        telefono_2: '',
        usuario: '',
        correo_electronico: '',
        password: '',
        pais: '',
        estado: '',
        ciudad: '',
        direccion: '',
        colegiado: '',
        tipo_usuario: '',
    });

    const [estados, setEstados] = useState([]);
    const [ciudades, setCiudades] = useState([]);

    // Función para cargar los estados según el país seleccionado
    useEffect(() => {
        if (data.pais) {
            fetch(`/api/estados/${data.pais}`) // Cambia esta ruta según tu backend
                .then(response => response.json())
                .then(estadosData => setEstados(estadosData))
                .catch(error => console.error('Error al cargar los estados:', error));
        } else {
            setEstados([]);
            setCiudades([]);
        }
    }, [data.pais]);

    // Función para cargar las ciudades según el estado seleccionado
    useEffect(() => {
        if (data.estado) {
            fetch(`/api/ciudades/${data.estado}`) // Cambia esta ruta según tu backend
                .then(response => response.json())
                .then(ciudadesData => setCiudades(ciudadesData))
                .catch(error => console.error('Error al cargar las ciudades:', error));
        } else {
            setCiudades([]);
        }
    }, [data.estado]);

    const handleSubmit = (e) => {
        e.preventDefault();
        post('/users');
    };

    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Crear Nuevo Usuario
                </h2>
            }
        >
            <div className="p-6 bg-white shadow-sm sm:rounded-lg">
                <form onSubmit={handleSubmit} className="space-y-6">
                    <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {/* Primer nombre */}
                        <div>
                            <label htmlFor="primer_nombre" className="block text-sm font-medium text-gray-700">
                                Primer Nombre
                            </label>
                            <input
                                id="primer_nombre"
                                type="text"
                                value={data.primer_nombre}
                                onChange={e => setData('primer_nombre', e.target.value)}
                                className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            />
                            {errors.primer_nombre && <span className="text-red-500 text-sm">{errors.primer_nombre}</span>}
                        </div>

                        {/* Segundo nombre */}
                        <div>
                            <label htmlFor="segundo_nombre" className="block text-sm font-medium text-gray-700">
                                Segundo Nombre
                            </label>
                            <input
                                id="segundo_nombre"
                                type="text"
                                value={data.segundo_nombre}
                                onChange={e => setData('segundo_nombre', e.target.value)}
                                className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            />
                            {errors.segundo_nombre && <span className="text-red-500 text-sm">{errors.segundo_nombre}</span>}
                        </div>

                        {/* Otros nombres */}
                        <div>
                            <label htmlFor="otros_nombres" className="block text-sm font-medium text-gray-700">
                                Otros Nombres
                            </label>
                            <input
                                id="otros_nombres"
                                type="text"
                                value={data.otros_nombres}
                                onChange={e => setData('otros_nombres', e.target.value)}
                                className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            />
                            {errors.otros_nombres && <span className="text-red-500 text-sm">{errors.otros_nombres}</span>}
                        </div>

                        {/* Primer apellido */}
                        <div>
                            <label htmlFor="primer_apellido" className="block text-sm font-medium text-gray-700">
                                Primer Apellido
                            </label>
                            <input
                                id="primer_apellido"
                                type="text"
                                value={data.primer_apellido}
                                onChange={e => setData('primer_apellido', e.target.value)}
                                className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            />
                            {errors.primer_apellido && <span className="text-red-500 text-sm">{errors.primer_apellido}</span>}
                        </div>

                        {/* Segundo apellido */}
                        <div>
                            <label htmlFor="segundo_apellido" className="block text-sm font-medium text-gray-700">
                                Segundo Apellido
                            </label>
                            <input
                                id="segundo_apellido"
                                type="text"
                                value={data.segundo_apellido}
                                onChange={e => setData('segundo_apellido', e.target.value)}
                                className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            />
                            {errors.segundo_apellido && <span className="text-red-500 text-sm">{errors.segundo_apellido}</span>}
                        </div>

                        {/* Tipo de documento de identificación */}
                        <div>
                            <label htmlFor="tipo_documento_identificacion" className="block text-sm font-medium text-gray-700">
                                Tipo de Documento de Identificación
                            </label>
                            <select
                                id="tipo_documento_identificacion"
                                value={data.tipo_documento_identificacion}
                                onChange={e => setData('tipo_documento_identificacion', e.target.value)}
                                className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            >
                                <option value="">Seleccionar Tipo de Usuario</option>
                                {documento.map(item => (
                                    <option key={item.id} value={item.id}>
                                        {item.nombre}
                                    </option>
                                ))}
                            </select>
                            {errors.tipo_documento_identificacion && <span className="text-red-500 text-sm">{errors.tipo_documento_identificacion}</span>}
                        </div>

                        {/* Identificación */}
                        <div>
                            <label htmlFor="identificacion" className="block text-sm font-medium text-gray-700">
                                Identificación
                            </label>
                            <input
                                id="identificacion"
                                type="text"
                                value={data.identificacion}
                                onChange={e => setData('identificacion', e.target.value)}
                                className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            />
                            {errors.identificacion && <span className="text-red-500 text-sm">{errors.identificacion}</span>}
                        </div>

                        {/* Teléfono 1 */}
                        <div>
                            <label htmlFor="telefono_1" className="block text-sm font-medium text-gray-700">
                                Teléfono 1
                            </label>
                            <input
                                id="telefono_1"
                                type="text"
                                value={data.telefono_1}
                                onChange={e => setData('telefono_1', e.target.value)}
                                className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            />
                            {errors.telefono_1 && <span className="text-red-500 text-sm">{errors.telefono_1}</span>}
                        </div>

                        {/* Teléfono 2 */}
                        <div>
                            <label htmlFor="telefono_2" className="block text-sm font-medium text-gray-700">
                                Teléfono 2
                            </label>
                            <input
                                id="telefono_2"
                                type="text"
                                value={data.telefono_2}
                                onChange={e => setData('telefono_2', e.target.value)}
                                className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            />
                            {errors.telefono_2 && <span className="text-red-500 text-sm">{errors.telefono_2}</span>}
                        </div>

                        {/* Usuario */}
                        <div>
                            <label htmlFor="usuario" className="block text-sm font-medium text-gray-700">
                                Usuario
                            </label>
                            <input
                                id="usuario"
                                type="text"
                                value={data.usuario}
                                onChange={e => setData('usuario', e.target.value)}
                                className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            />
                            {errors.usuario && <span className="text-red-500 text-sm">{errors.usuario}</span>}
                        </div>

                        {/* Correo Electrónico */}
                        <div>
                            <label htmlFor="correo_electronico" className="block text-sm font-medium text-gray-700">
                                Correo Electrónico
                            </label>
                            <input
                                id="correo_electronico"
                                type="email"
                                value={data.correo_electronico}
                                onChange={e => setData('correo_electronico', e.target.value)}
                                className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            />
                            {errors.correo_electronico && <span className="text-red-500 text-sm">{errors.correo_electronico}</span>}
                        </div>

                        {/* Password */}
                        <div>
                            <label htmlFor="password" className="block text-sm font-medium text-gray-700">
                                Contraseña
                            </label>
                            <input
                                id="password"
                                type="password"
                                value={data.password}
                                onChange={e => setData('password', e.target.value)}
                                className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            />
                            {errors.password && <span className="text-red-500 text-sm">{errors.password}</span>}
                        </div>

                        {/* País */}
                        <div>
                            <label htmlFor="pais" className="block text-sm font-medium text-gray-700">
                                País
                            </label>
                            <select
                                id="pais"
                                value={data.pais}
                                onChange={e => setData('pais', e.target.value)}
                                className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            >
                                <option value="">Seleccionar País</option>
                                {pais.map(paisItem => (
                                    <option key={paisItem.id} value={paisItem.id}>
                                        {paisItem.nombre}
                                    </option>
                                ))}
                            </select>
                            {errors.pais && <span className="text-red-500 text-sm">{errors.pais}</span>}
                        </div>

                        {/* Estado */}
                        <div>
                            <label htmlFor="estado" className="block text-sm font-medium text-gray-700">
                                Estado
                            </label>
                            <select
                                id="estado"
                                value={data.estado}
                                onChange={e => setData('estado', e.target.value)}
                                className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                disabled={!data.pais} // Deshabilita si no hay país seleccionado
                            >
                                <option value="">Seleccionar Estado</option>
                                {estados.map(estado => (
                                    <option key={estado.id} value={estado.id}>
                                        {estado.nombre}
                                    </option>
                                ))}
                            </select>
                            {errors.estado && <span className="text-red-500 text-sm">{errors.estado}</span>}
                        </div>

                        {/* Ciudad */}
                        <div>
                            <label htmlFor="ciudad" className="block text-sm font-medium text-gray-700">
                                Ciudad
                            </label>
                            <select
                                id="ciudad"
                                value={data.ciudad}
                                onChange={e => setData('ciudad', e.target.value)}
                                className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                disabled={!data.estado} // Deshabilita si no hay estado seleccionado
                            >
                                <option value="">Seleccionar Ciudad</option>
                                {ciudades.map(ciudad => (
                                    <option key={ciudad.id} value={ciudad.id}>
                                        {ciudad.nombre}
                                    </option>
                                ))}
                            </select>
                            {errors.ciudad && <span className="text-red-500 text-sm">{errors.ciudad}</span>}
                        </div>

                        {/* Dirección */}
                        <div>
                            <label htmlFor="direccion" className="block text-sm font-medium text-gray-700">
                                Dirección
                            </label>
                            <input
                                id="direccion"
                                type="text"
                                value={data.direccion}
                                onChange={e => setData('direccion', e.target.value)}
                                className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            />
                            {errors.direccion && <span className="text-red-500 text-sm">{errors.direccion}</span>}
                        </div>

                        {/* Colegiado */}
                        <div>
                            <label htmlFor="colegiado" className="block text-sm font-medium text-gray-700">
                                Colegiado
                            </label>
                            <input
                                id="colegiado"
                                type="text"
                                value={data.colegiado}
                                onChange={e => setData('colegiado', e.target.value)}
                                className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            />
                            {errors.colegiado && <span className="text-red-500 text-sm">{errors.colegiado}</span>}
                        </div>

                        {/* Tipo de Usuario */}
                        <div>
                            <label htmlFor="tipo_usuario" className="block text-sm font-medium text-gray-700">
                                Tipo de Usuario
                            </label>
                            <select
                                id="tipo_usuario"
                                value={data.tipo_usuario}
                                onChange={e => setData('tipo_usuario', e.target.value)}
                                className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            >
                                <option value="">Seleccionar Tipo de Usuario</option>
                                {tiposUsuarios.map(item => (
                                    <option key={item.id} value={item.id}>
                                        {item.descripcion}
                                    </option>
                                ))}
                            </select>
                            {errors.tipo_usuario && <span className="text-red-500 text-sm">{errors.tipo_usuario}</span>}
                        </div>
                    </div>

                    <div className="flex justify-end">
                        <button
                            type="submit"
                            disabled={processing}
                            className="px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700"
                        >
                            Crear Usuario
                        </button>
                    </div>
                </form>
            </div>
        </AuthenticatedLayout>
    );
};

export default CreateUser;
