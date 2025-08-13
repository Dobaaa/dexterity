// API Configuration
export const API_BASE_URL = 'http://localhost:8000/api';

export const API_ENDPOINTS = {
  // News
  NEWS: {
    LIST: `${API_BASE_URL}/news`,
    CREATE: `${API_BASE_URL}/news`,
    SHOW: (id) => `${API_BASE_URL}/news/${id}`,
    UPDATE: (id) => `${API_BASE_URL}/news/${id}`,
    DELETE: (id) => `${API_BASE_URL}/news/${id}`,
  },
  
  // Services
  SERVICES: {
    LIST: `${API_BASE_URL}/services`,
    CREATE: `${API_BASE_URL}/services`,
    SHOW: (id) => `${API_BASE_URL}/services/${id}`,
    UPDATE: (id) => `${API_BASE_URL}/services/${id}`,
    DELETE: (id) => `${API_BASE_URL}/services/${id}`,
  },
  
  // Jobs
  JOBS: {
    LIST: `${API_BASE_URL}/jobs`,
    CREATE: `${API_BASE_URL}/jobs`,
    SHOW: (id) => `${API_BASE_URL}/jobs/${id}`,
    UPDATE: (id) => `${API_BASE_URL}/jobs/${id}`,
    DELETE: (id) => `${API_BASE_URL}/jobs/${id}`,
  },
  
  // Contacts
  CONTACTS: {
    LIST: `${API_BASE_URL}/contacts`,
    CREATE: `${API_BASE_URL}/contacts`,
  },
};

// API Headers
export const getHeaders = () => ({
  'Content-Type': 'application/json',
  'Accept': 'application/json',
});

export const getFormDataHeaders = () => ({
  'Accept': 'application/json',
});
