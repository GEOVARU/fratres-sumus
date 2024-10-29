import React, { useState } from 'react';
import { usePage } from '@inertiajs/react';
import axios from 'axios';

const CreateAsignacion = () => {
    const { diasSemana, tiposAsignaciones } = usePage().props;
    const [formData, setFormData] = useState({
        usuario_interesado: '',
        usuario_asignado: '',
        hora_inicio: '',
        minuto_inicio: '',
        hora_fin: '',
        minuto_fin: '',
        id_dia: '',
        anio: '',
        id_tipo_asignacion: '',
        usuario_registro: '',
    });

    const handleChange = (e) => {
        const { name, value } = e.target;
        setFormData({ ...formData, [name]: value });
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        axios.post('/asignaciones', formData)
            .then(() => {
                window.location.href = '/asignaciones';
            })
            .catch(error => {
                console.error('Error al crear asignación:', error);
            });
    };

    return (
        <div>
            <h1>Crear Nueva Asignación</h1>
            <form onSubmit={handleSubmit}>
                <div>
                    <label>Usuario Interesado:</label>
                    <input
                        type="text"
                        name="usuario_interesado"
                        maxLength="25"
                        value={formData.usuario_interesado}
                        onChange={handleChange}
                        required
                    />
                </div>
                <div>
                    <label>Usuario Asignado:</label>
                    <input
                        type="text"
                        name="usuario_asignado"
                        maxLength="25"
                        value={formData.usuario_asignado}
                        onChange={handleChange}
                        required
                    />
                </div>
                <div>
                    <label>Hora de Inicio:</label>
                    <input
                        type="number"
                        name="hora_inicio"
                        value={formData.hora_inicio}
                        onChange={handleChange}
                        required
                    />
                </div>
                <div>
                    <label>Minuto de Inicio:</label>
                    <input
                        type="number"
                        name="minuto_inicio"
                        value={formData.minuto_inicio}
                        onChange={handleChange}
                        required
                    />
                </div>
                <div>
                    <label>Hora de Fin:</label>
                    <input
                        type="number"
                        name="hora_fin"
                        value={formData.hora_fin}
                        onChange={handleChange}
                        required
                    />
                </div>
                <div>
                    <label>Minuto de Fin:</label>
                    <input
                        type="number"
                        name="minuto_fin"
                        value={formData.minuto_fin}
                        onChange={handleChange}
                        required
                    />
                </div>
                <div>
                    <label>Día de la Semana:</label>
                    <select
                        name="id_dia"
                        value={formData.id_dia}
                        onChange={handleChange}
                        required
                    >
                        <option value="">Selecciona un día</option>
                        {diasSemana.map(dia => (
                            <option key={dia.id} value={dia.id}>{dia.nombre}</option>
                        ))}
                    </select>
                </div>
                <div>
                    <label>Año:</label>
                    <input
                        type="number"
                        name="anio"
                        value={formData.anio}
                        onChange={handleChange}
                        required
                    />
                </div>
                <div>
                    <label>Tipo de Asignación:</label>
                    <select
                        name="id_tipo_asignacion"
                        value={formData.id_tipo_asignacion}
                        onChange={handleChange}
                        required
                    >
                        <option value="">Selecciona un tipo</option>
                        {tiposAsignaciones.map(tipo => (
                            <option key={tipo.id} value={tipo.id}>{tipo.descripcion}</option>
                        ))}
                    </select>
                </div>
                <div>
                    <label>Usuario Registro:</label>
                    <input
                        type="text"
                        name="usuario_registro"
                        maxLength="50"
                        value={formData.usuario_registro}
                        onChange={handleChange}
                        required
                    />
                </div>
                <button type="submit">Crear Asignación</button>
            </form>
        </div>
    );
};

export default CreateAsignacion;
