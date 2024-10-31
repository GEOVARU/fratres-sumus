import React, { useEffect, useState } from 'react';
import { useForm } from '@inertiajs/react';
import '../../../css/secciones.css'; // Archivo CSS para estilos
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';

const CreateAsignacion = () => {
    const { data, setData, post, processing, errors } = useForm({
        pregunta: '',
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        post('/preguntas');
    };
    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Crear Nueva Pregunta
                </h2>
            }
        >
            <div className="p-6 bg-white shadow-sm sm:rounded-lg">
                <form onSubmit={handleSubmit} className="space-y-6">
                    <div className="grid grid-cols-1 md:grid-cols-2 gap-6">


                        <div>
                            <label htmlFor="pregunta" className="block text-sm font-medium text-gray-700">Pregunta:</label>
                            <input
                                type="text"
                                id="pregunta"
                                name="pregunta"
                                value={data.pregunta}
                                onChange={e => setData('pregunta', e.target.value)}
                                required
                                className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            />
                            {errors.pregunta && <span className="text-red-500 text-sm">{errors.pregunta}</span>}
                        </div>
                        <div></div>
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
