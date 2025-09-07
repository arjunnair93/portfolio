
import axios from 'axios';

// Determine the correct API base URL
const getApiBaseUrl = () => {
  if (import.meta.env.VITE_API_BASE_URL) {
    return import.meta.env.VITE_API_BASE_URL;
  }
  
  // In development, use nginx proxy on port 80
  if (import.meta.env.DEV) {
    return 'http://localhost/api';
  }
  
  // In production, use relative path
  return '/api';
};

const api = axios.create({
  baseURL: getApiBaseUrl(),
  withCredentials: false, // Set to false for CORS
  headers: {
    'Content-Type': 'application/json',
    'Accept': 'application/json'
  }
});

// Project interfaces
export interface Project {
  id: number
  title: string
  description: string
  technologies: string
  github_url?: string
  demo_url?: string
  image_url?: string
  created_at: string
  updated_at: string
}

// API methods
export const projectsApi = {
  getAll: () => api.get<Project[]>('/projects'),
  getById: (id: number) => api.get<Project>(`/projects/${id}`),
}

export default api;
