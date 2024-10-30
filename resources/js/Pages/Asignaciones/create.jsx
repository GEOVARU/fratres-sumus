import React, { useEffect, useState } from 'react';
import { useForm } from '@inertiajs/react';
import '../../../css/secciones.css'; // Archivo CSS para estilos
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';

const CreateAsignacion = ({ user, beneficiarias, diasSemana, tiposAsignaciones }) => {
    const { data, setData, post, processing, errors } = useForm({
        usuario_interesado: '',
        usuario_asignado: '',
        hora_inicio: '9',
        minuto_inicio: '00',
        hora_fin: '9',
        minuto_fin: '59',
        id_dia: '',
        anio: '2024',
        id_tipo_asignacion: '',
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        post('/asignaciones');
    };
    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Crear Nueva Asignación
                </h2>
            }
        >
            <div className="p-6 bg-white shadow-sm sm:rounded-lg">
                <form onSubmit={handleSubmit} className="space-y-6">
                    <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>

                            <label htmlFor="usuario_interesado" className="block text-sm font-medium text-gray-700">Usuario Interesado:</label>
                            <select
                                id="usuario_interesado"
                                name="usuario_interesado"
                                value={data.usuario_interesado}
                                onChange={e => setData('usuario_interesado', e.target.value)}
                                required
                                className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            >
                                <option value="">Selecciona una opcions</option>
                                {beneficiarias.map(item => (
                                    <option key={item.id} value={item.usuario}>{item.primer_nombre} {item.segundo_nombre} {item.primer_apellido} {item.segundo_apellido} ({item.type_user.descripcion})</option>
                                ))}
                            </select>
                            {errors.usuario_interesado && <span className="text-red-500 text-sm">{errors.usuario_interesado}</span>}

                        </div>
                        <div>
                            <label htmlFor="usuario_asignado" className="block text-sm font-medium text-gray-700">Usuario Asignado:</label>
                            <select
                                id="usuario_asignado"
                                name="usuario_asignado"
                                value={data.usuario_asignado}
                                onChange={e => setData('usuario_asignado', e.target.value)}
                                required
                                className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            >
                                <option value="">Selecciona una opcions</option>
                                {user.map(item => (
                                    <option key={item.id} value={item.usuario}>{item.primer_nombre} {item.segundo_nombre} {item.primer_apellido} {item.segundo_apellido} ({item.type_user.descripcion})</option>
                                ))}
                            </select>
                            {errors.usuario_asignado && <span className="text-red-500 text-sm">{errors.usuario_asignado}</span>}
                        </div>
                        <div>
                            <label htmlFor="hora_inicio" className="block text-sm font-medium text-gray-700">Hora de Inicio:</label>
                            <input
                                type="number"
                                id="hora_inicio"
                                name="hora_inicio"
                                value={data.hora_inicio}
                                onChange={e => setData('hora_inicio', e.target.value)}
                                required
                                className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            />
                            {errors.hora_inicio && <span className="text-red-500 text-sm">{errors.hora_inicio}</span>}
                        </div>
                        <div>
                            <label htmlFor="minuto_inicio" className="block text-sm font-medium text-gray-700">Minuto de Inicio:</label>
                            <input
                                type="number"
                                id="minuto_inicio"
                                name="minuto_inicio"
                                value={data.minuto_inicio}
                                onChange={e => setData('minuto_inicio', e.target.value)}
                                required
                                className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            />
                            {errors.minuto_inicio && <span className="text-red-500 text-sm">{errors.minuto_inicio}</span>}
                        </div>
                        <div>
                            <label htmlFor="hora_fin" className="block text-sm font-medium text-gray-700">Hora de Fin:</label>
                            <input
                                type="number"
                                id="hora_fin"
                                name="hora_fin"
                                value={data.hora_fin}
                                onChange={e => setData('hora_fin', e.target.value)}
                                required
                                className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            />
                            {errors.hora_fin && <span className="text-red-500 text-sm">{errors.hora_fin}</span>}
                        </div>
                        <div>
                            <label htmlFor="minuto_fin" className="block text-sm font-medium text-gray-700">Minuto de Fin:</label>
                            <input
                                type="number"
                                id="minuto_fin"
                                name="minuto_fin"
                                value={data.minuto_fin}
                                onChange={e => setData('minuto_fin', e.target.value)}
                                required
                                className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            />
                            {errors.minuto_fin && <span className="text-red-500 text-sm">{errors.minuto_fin}</span>}
                        </div>
                        <div>
                            <label htmlFor="id_dia" className="block text-sm font-medium text-gray-700">Día de la Semana:</label>
                            <select
                                id="id_dia"
                                name="id_dia"
                                value={data.id_dia}
                                onChange={e => setData('id_dia', e.target.value)}
                                required
                                className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            >
                                <option value="">Selecciona una opcions</option>
                                {diasSemana.map(dia => (
                                    <option key={dia.id} value={dia.id}>{dia.nombre}</option>
                                ))}
                            </select>
                            {errors.id_dia && <span className="text-red-500 text-sm">{errors.id_dia}</span>}
                        </div>
                        <div>
                            <label htmlFor="anio" className="block text-sm font-medium text-gray-700">Año:</label>
                            <input
                                type="number"
                                id="anio"
                                name="anio"
                                value={data.anio}
                                onChange={e => setData('anio', e.target.value)}
                                required
                                className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            />
                            {errors.anio && <span className="text-red-500 text-sm">{errors.anio}</span>}
                        </div>
                        <div>
                            <label htmlFor="id_tipo_asignacion" className="block text-sm font-medium text-gray-700">Tipo de Asignación:</label>
                            <select
                                id="id_tipo_asignacion"
                                name="id_tipo_asignacion"
                                value={data.id_tipo_asignacion}
                                onChange={e => setData('id_tipo_asignacion', e.target.value)}
                                required
                                className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            >
                                <option value="">Selecciona una opcions</option>
                                {tiposAsignaciones.map(tipo => (
                                    <option key={tipo.id} value={tipo.id}>{tipo.descripcion}</option>
                                ))}
                            </select>
                            {errors.id_tipo_asignacion && <span className="text-red-500 text-sm">{errors.id_tipo_asignacion}</span>}
                        </div>
                        <div>
                        </div>

                        <div className="flex justify-end">
                            <button
                                type="submit"
                                disabled={processing}
                                className="px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700"
                            >
                                Crear Asignación
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </AuthenticatedLayout>

    );
};

export default CreateAsignacion;
