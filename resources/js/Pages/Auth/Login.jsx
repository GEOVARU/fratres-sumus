import React from 'react'; // Importa React
import { useForm } from '@inertiajs/inertia-react'; // Importa useForm de Inertia.js
import InputLabel from '@/Components/InputLabel'; // Asegúrate de que la ruta sea correcta
import TextInput from '@/Components/TextInput'; // Asegúrate de que la ruta sea correcta
import InputError from '@/Components/InputError'; // Asegúrate de que la ruta sea correcta
import PrimaryButton from '@/Components/PrimaryButton'; // Asegúrate de que la ruta sea correcta
import GuestLayout from '@/Layouts/GuestLayout'; // Asegúrate de que la ruta sea correcta
import { Head } from '@inertiajs/react'; // Importa Head de Inertia.js

import '../../../css/login.css'; // Asegúrate de que la ruta sea correcta

const Login = ({ status }) => {
    const { data, setData, post, processing, errors, reset } = useForm({
        correo_electronico: '',
        usuario: '',
        password: '',
        remember: false,
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
                <div className="status-message">
                    {status}
                </div>
            )}

                <h1 className="login-title">Iniciar Sesión</h1>
                <form onSubmit={handleSubmit}>
                    <div className="input-group">
                        <InputLabel htmlFor="correo_electronico" value="Correo Electrónico" />
                        <TextInput
                            id="correo_electronico"
                            type="email"
                            name="correo_electronico"
                            value={data.correo_electronico}
                            className="text-input"
                            autoComplete="username"
                            isFocused={true}
                            onChange={(e) => setData('correo_electronico', e.target.value)}
                            required // Campo obligatorio
                        />
                        <InputError message={errors.correo_electronico} className="input-error" />
                    </div>

                    <div className="input-group">
                        <InputLabel htmlFor="usuario" value="Usuario" />
                        <TextInput
                            id="usuario"
                            type="text"
                            name="usuario"
                            value={data.usuario}
                            className="text-input"
                            autoComplete="username"
                            onChange={(e) => setData('usuario', e.target.value)}
                            required 
                        />
                        <InputError message={errors.usuario} className="input-error" />
                    </div>

                    <div className="input-group">
                        <InputLabel htmlFor="password" value="Contraseña" />
                        <TextInput
                            id="password"
                            type="password"
                            name="password"
                            value={data.password}
                            className="text-input"
                            autoComplete="current-password"
                            onChange={(e) => setData('password', e.target.value)}
                            required 
                        />
                        <InputError message={errors.password} className="input-error" />
                    </div>

                    <div className="button-container">
                        <PrimaryButton className="submit-button" disabled={processing}>
                            {processing ? 'Cargando...' : 'Iniciar Sesión'}
                        </PrimaryButton>
                    </div>
                </form>
        </GuestLayout>
    );
};

export default Login;
