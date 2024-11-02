import React from 'react';
import { useForm } from '@inertiajs/react';
import '../../../css/secciones.css'; // Archivo CSS para estilos
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';

const CreateAsignacionPregunta = ({ TipoAsignaciones, Preguntas }) => {
    const { data, setData, post, processing, errors } = useForm({
        id_tipo_asignacion: '',
        id_pregunta: '',
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        post('/asignaPreguntasTipo'); // Asegúrate de que esta ruta sea la correcta en el backend
    };

    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Crear Nueva Asignación de Pregunta
                </h2>
            }
        >
            <div className="p-6 bg-white shadow-sm sm:rounded-lg">
                <form onSubmit={handleSubmit} className="space-y-6">
                    <div className="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>
                            <label htmlFor="id_tipo_asignacion" className="block text-sm font-medium text-gray-700">
                                Tipo de Asignación:
                            </label>
                            <select
                                id="id_tipo_asignacion"
                                value={data.id_tipo_asignacion}
                                onChange={e => setData('id_tipo_asignacion', e.target.value)}
                                className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            >
                                <option value="">Seleccionar Tipo de Usuario</option>
                                {TipoAsignaciones.map(item => (
                                    <option key={item.id} value={item.id}>
                                        {item.descripcion}
                                    </option>
                                ))}
                            </select>
                            {errors.id_tipo_asignacion && <span className="text-red-500 text-sm">{errors.id_tipo_asignacion}</span>}
                        </div>

                        <div>
                            <label htmlFor="id_pregunta" className="block text-sm font-medium text-gray-700">
                                Pregunta:
                            </label>
                            <select
                                id="id_pregunta"
                                value={data.id_pregunta}
                                onChange={e => setData('id_pregunta', e.target.value)}
                                className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            >
                                <option value="">Seleccionar Tipo de Usuario</option>
                                {Preguntas.map(item => (
                                    <option key={item.id} value={item.id}>
                                        {item.pregunta}
                                    </option>
                                ))}
                            </select>
                            {errors.id_pregunta && <span className="text-red-500 text-sm">{errors.id_pregunta}</span>}
                        </div>




                        <div className="flex justify-end col-span-2">
                            <button
                                type="submit"
                                disabled={processing}
                                className="px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700"
                            >
                                Crear Registro
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </AuthenticatedLayout>
    );
};

export default CreateAsignacionPregunta;
