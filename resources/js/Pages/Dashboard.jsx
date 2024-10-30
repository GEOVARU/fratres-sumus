import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link, usePage } from '@inertiajs/react';

export default function Dashboard() {
    const { auth } = usePage().props; // Accede a los datos de autenticación

    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Dashboard
                </h2>
            }
        >
            <Head title="Dashboard" />

            {/* Muestra el ID del usuario autenticado */}
            <p>ID del usuario autenticado: {auth.user.tipo_usuario}</p>

            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

                        {auth.user.tipo_usuario === 1 && <>
                            <Link href="/ruta-destino" className="block overflow-hidden bg-white shadow-lg rounded-lg transition transform hover:scale-105 hover:shadow-xl">
                                <div className="p-6">
                                    <h3 className="text-lg font-semibold text-gray-800">
                                        Crear nuevas Preguntas
                                    </h3>
                                    <p className="mt-2 text-gray-600">
                                        Breve descripción o contenido de la tarjeta que te da una idea sobre su propósito.
                                    </p>
                                </div>
                            </Link>
                        </>}
                        {auth.user.tipo_usuario === (1 || 2) && <>
                            <Link href="/ruta-destino" className="block overflow-hidden bg-white shadow-lg rounded-lg transition transform hover:scale-105 hover:shadow-xl">
                                <div className="p-6">
                                    <h3 className="text-lg font-semibold text-gray-800">
                                        Asignar preguntas a Tipo de asignacion
                                    </h3>
                                    <p className="mt-2 text-gray-600">
                                        Breve descripción o contenido de la tarjeta que te da una idea sobre su propósito.
                                    </p>
                                </div>
                            </Link>
                        </>}

                        {auth.user.tipo_usuario === (1 || 2) && <>
                            <Link href="/ruta-destino" className="block overflow-hidden bg-white shadow-lg rounded-lg transition transform hover:scale-105 hover:shadow-xl">
                                <div className="p-6">
                                    <h3 className="text-lg font-semibold text-gray-800">
                                        Reportería de asignaciones
                                    </h3>
                                    <p className="mt-2 text-gray-600">
                                        Breve descripción o contenido de la tarjeta que te da una idea sobre su propósito.
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
                                    Breve descripción o contenido de la tarjeta que te da una idea sobre su propósito.
                                </p>
                            </div>
                        </Link>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
