import React, { useEffect, useState } from 'react';
import { useForm } from '@inertiajs/react';
import '../../../css/secciones.css'; // Archivo CSS para estilos
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';

const EditRegistro = ({ dataInfo }) => {
    const { data, setData, put, processing, errors } = useForm({
        pregunta: dataInfo.pregunta || '',
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        put(`/preguntas/${dataInfo.id}`);
    };

    useEffect(() => {
        setData({
            pregunta: dataInfo.pregunta || '',
        });
    }, [dataInfo]);

    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Editar Registro
                </h2>
            }
        >
            <div className="p-6 bg-white shadow-sm sm:rounded-lg">
                <form onSubmit={handleSubmit} className="space-y-6">
                    <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {/* Pregunta */}
                        <div>
                            <label htmlFor="pregunta" className="block text-sm font-medium text-gray-700">
                                Pregunta
                            </label>
                            <input
                                id="pregunta"
                                type="text"
                                value={data.pregunta} // Aquí usamos data.pregunta en lugar de dataInfo.pregunta
                                onChange={e => setData('pregunta', e.target.value)}
                                className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            />
                            {errors.pregunta && <span className="text-red-500 text-sm">{errors.pregunta}</span>}
                        </div>
                        <div>
                            <button
                                type="submit"
                                disabled={processing}
                                className="inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                            >
                                {processing ? 'Guardando...' : 'Guardar Cambios'}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </AuthenticatedLayout>
    );
};

export default EditRegistro;
