import React from 'react';
import { Link, useLocation } from 'react-router-dom';
import { 
  Home, 
  Newspaper, 
  Briefcase, 
  Settings, 
  Users, 
  MessageSquare,
  BarChart3,
  FileText,
  Calendar,
  UserCheck
} from 'lucide-react';

const Sidebar = ({ isOpen, onClose }) => {
  const location = useLocation();

  const menuItems = [
    {
      name: 'الرئيسية',
      icon: Home,
      path: '/',
      color: 'text-blue-600'
    },
    {
      name: 'لوحة المعلومات',
      icon: BarChart3,
      path: '/dashboard',
      color: 'text-green-600'
    },
    {
      name: 'الأخبار',
      icon: Newspaper,
      path: '/news',
      color: 'text-purple-600'
    },
    {
      name: 'الخدمات',
      icon: Settings,
      path: '/services',
      color: 'text-orange-600'
    },
    {
      name: 'الوظائف',
      icon: Briefcase,
      path: '/jobs',
      color: 'text-indigo-600'
    },
    {
      name: 'طلبات التوظيف',
      icon: UserCheck,
      path: '/jobs-apps',
      color: 'text-cyan-600'
    },
    {
      name: 'رسائل الاتصال',
      icon: MessageSquare,
      path: '/contacts',
      color: 'text-red-600'
    },
    {
      name: 'حجوزات الاستشارات',
      icon: Calendar,
      path: '/service-requests',
      color: 'text-teal-600'
    },
    {
      name: 'التقارير',
      icon: FileText,
      path: '/reports',
      color: 'text-gray-600'
    }
  ];

  const isActive = (path) => {
    if (path === '/') {
      return location.pathname === '/';
    }
    return location.pathname.startsWith(path);
  };

  return (
    <>
      {/* Overlay for mobile */}
      {isOpen && (
        <div 
          className="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden"
          onClick={onClose}
        />
      )}
      
      {/* Sidebar */}
      <div className={`
        fixed top-0 left-0 h-full w-64 bg-white shadow-xl z-50 transform transition-transform duration-300 ease-in-out
        ${isOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'}
      `}>
        {/* Logo */}
        <div className="flex items-center justify-center h-16 bg-gradient-to-r from-blue-600 to-blue-800">
          <div className="text-white text-xl font-bold">Dexterity</div>
        </div>
        
        {/* Navigation */}
        <nav className="mt-8 px-4">
          <ul className="space-y-2">
            {menuItems.map((item) => {
              const Icon = item.icon;
              return (
                <li key={item.path}>
                  <Link
                    to={item.path}
                    className={`
                      flex items-center px-4 py-3 text-gray-700 rounded-lg transition-colors duration-200
                      hover:bg-blue-50 hover:text-blue-700
                      ${isActive(item.path) ? 'bg-blue-100 text-blue-700 border-r-2 border-blue-600' : ''}
                    `}
                    onClick={() => onClose && onClose()}
                  >
                    <Icon className={`w-5 h-5 mr-3 ${item.color}`} />
                    <span className="font-medium">{item.name}</span>
                  </Link>
                </li>
              );
            })}
          </ul>
        </nav>
        
        {/* Footer */}
        <div className="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-200">
          <div className="text-center text-sm text-gray-500">
            <p>Dexterity Dashboard</p>
            <p className="text-xs mt-1">v1.0.0</p>
          </div>
        </div>
      </div>
    </>
  );
};

export default Sidebar;
