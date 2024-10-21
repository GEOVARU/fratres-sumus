import React from 'react'; // Importa React
import { useForm } from '@inertiajs/inertia-react'; // Importa useForm de Inertia.js
import InputLabel from '@/Components/InputLabel'; // Asegúrate de que la ruta sea correcta
import TextInput from '@/Components/TextInput'; // Asegúrate de que la ruta sea correcta
import InputError from '@/Components/InputError'; // Asegúrate de que la ruta sea correcta
import PrimaryButton from '@/Components/PrimaryButton'; // Asegúrate de que la ruta sea correcta
import GuestLayout from '@/Layouts/GuestLayout'; // Asegúrate de que la ruta sea correcta
import { Head } from '@inertiajs/react'; // Importa Head de Inertia.js

const Login = ({ status }) => {
    const { data, setData, post, processing, errors, reset } = useForm({
        correo_electronico: '',
        usuario: '',
        password: '',
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        post(route('login'), {
            onFinish: () => reset('password'), // Reinicia el campo de contraseña después del envío
        });
    };

    return (
        <GuestLayout>
            <Head title="Iniciar Sesión" />

            {status && (
                <div className="mb-4 text-sm font-medium text-green-600">
                    {status}
                </div>
            )}

            <h1>Iniciar Sesión</h1>
            <form onSubmit={handleSubmit}>
                <div>
                    <InputLabel htmlFor="correo_electronico" value="Correo Electrónico" />
                    <TextInput
                        id="correo_electronico"
                        type="email" // Cambiado a 'email' para mejor validación
                        name="correo_electronico"
                        value={data.correo_electronico}
                        className="mt-1 block w-full"
                        autoComplete="username"
                        isFocused={true}
                        onChange={(e) => setData('correo_electronico', e.target.value)}
                        required // Campo obligatorio
                    />
                    <InputError message={errors.correo_electronico} className="mt-2" />
                </div>

                <div className="mt-4">
                    <InputLabel htmlFor="usuario" value="Usuario" />
                    <TextInput
                        id="usuario"
                        type="text"
                        name="usuario"
                        value={data.usuario}
                        className="mt-1 block w-full"
                        autoComplete="username"
                        onChange={(e) => setData('usuario', e.target.value)}
                        required // Campo obligatorio
                    />
                    <InputError message={errors.usuario} className="mt-2" />
                </div>

                <div className="mt-4">
                    <InputLabel htmlFor="password" value="Contraseña" />
                    <TextInput
                        id="password"
                        type="password"
                        name="password"
                        value={data.password}
                        className="mt-1 block w-full"
                        autoComplete="current-password"
                        onChange={(e) => setData('password', e.target.value)}
                        required // Campo obligatorio
                    />
                    <InputError message={errors.password} className="mt-2" />
                </div>

                <div className="mt-4 flex items-center justify-end">
                    <PrimaryButton className="ms-4" disabled={processing}>
                        {processing ? 'Cargando...' : 'Iniciar Sesión'}
                    </PrimaryButton>
                </div>
            </form>
        </GuestLayout>
    );
};

export default Login;
