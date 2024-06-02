import axios from 'axios';

const api = axios.create({
    baseURL: '/api', 
});

// Interceptor to add headers if the token exists
api.interceptors.request.use((config) => {
    const authToken = localStorage.getItem('authToken');
    if (authToken) {
        config.headers.Authorization = `Bearer ${authToken}`;
    }
    return config;
});

export default api;
