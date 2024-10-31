import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link, usePage } from '@inertiajs/react';

export default function Dashboard() {
    const user = usePage().props.auth.user;

    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Inicio
                </h2>
            }
        >
            <Head title="Inicio" />

            {/* Muestra el ID del usuario autenticado */}

            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <p>
                        Bienvenido {user.primer_nombre}  {user.primer_apellido}
                    </p>
                    <br />
                    <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

                        {user.tipo_usuario === 1 && <>
                            <Link href="/preguntas" className="block overflow-hidden bg-white shadow-lg rounded-lg transition transform hover:scale-105 hover:shadow-xl">
                                <div className="p-6">
                                    <h3 className="text-lg font-semibold text-gray-800">
                                        Crear nuevas Preguntas
                                    </h3>
                                    <p className="mt-2 text-gray-600">
                                        Cree nuevas preguntas que se utilizaran para formularios de reporteria en tipos de asignaciones
                                    </p>
                                </div>
                            </Link>
                        </>}
                        {user.tipo_usuario === (1 || 2) && <>
                            <Link href="/ruta-destino" className="block overflow-hidden bg-white shadow-lg rounded-lg transition transform hover:scale-105 hover:shadow-xl">
                                <div className="p-6">
                                    <h3 className="text-lg font-semibold text-gray-800">
                                        Asignar preguntas a Tipo de asignacion
                                    </h3>
                                    <p className="mt-2 text-gray-600">
                                        Las preguntas realizadas se relacionaran a un tipo de asignacion, puede ser a 1 o varios tipos.
                                    </p>
                                </div>
                            </Link>
                        </>}

                        {user.tipo_usuario === (1 || 2) && <>
                            <Link href="/ruta-destino" className="block overflow-hidden bg-white shadow-lg rounded-lg transition transform hover:scale-105 hover:shadow-xl">
                                <div className="p-6">
                                    <h3 className="text-lg font-semibold text-gray-800">
                                        Reportería de asignaciones
                                    </h3>
                                    <p className="mt-2 text-gray-600">
                                        Vea los resultados de las asignaciones basados en la repoteria que se realiza en cada asignacion.
                                    </p>
                                </div>
                            </Link>
                        </>}

                        <Link href="/ruta-destino" className="block overflow-hidden bg-white shadow-lg rounded-lg transition transform hover:scale-105 hover:shadow-xl">
                            <div className="p-6">
                                <h3 className="text-lg font-semibold text-gray-800">
                                    Mis Asignaciones
                                </h3>
                                <p className="mt-2 text-gray-600">
                                    Decubra las asinaciones que tiene su usuario, ya sea interesado o benefiado.
                                </p>
                            </div>
                        </Link>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
