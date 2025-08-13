import React from 'react';
import { 
  Newspaper, 
  Settings, 
  Briefcase, 
  MessageSquare, 
  TrendingUp, 
  Users,
  Eye,
  Plus
} from 'lucide-react';

const Home = () => {
  const stats = [
    {
      title: 'إجمالي الأخبار',
      value: '24',
      change: '+12%',
      changeType: 'positive',
      icon: Newspaper,
      color: 'bg-purple-500'
    },
    {
      title: 'إجمالي الخدمات',
      value: '8',
      change: '+3%',
      changeType: 'positive',
      icon: Settings,
      color: 'bg-orange-500'
    },
    {
      title: 'الوظائف المتاحة',
      value: '12',
      change: '+5%',
      changeType: 'positive',
      icon: Briefcase,
      color: 'bg-indigo-500'
    },
    {
      title: 'رسائل الاتصال',
      value: '156',
      change: '+23%',
      changeType: 'positive',
      icon: MessageSquare,
      color: 'bg-red-500'
    }
  ];

  const recentActivities = [
    {
      type: 'news',
      title: 'تم إضافة خبر جديد',
      description: 'افتتاح موقع Dexterity الجديد',
      time: 'منذ 5 دقائق',
      icon: Plus
    },
    {
      type: 'service',
      title: 'تم تحديث خدمة',
      description: 'خدمة إدارة الأصول',
      time: 'منذ 15 دقيقة',
      icon: Eye
    },
    {
      type: 'job',
      title: 'تم إضافة وظيفة جديدة',
      description: 'مهندس صيانة صناعية',
      time: 'منذ ساعة',
      icon: Plus
    },
    {
      type: 'contact',
      title: 'رسالة اتصال جديدة',
      description: 'من أحمد محمد',
      time: 'منذ ساعتين',
      icon: MessageSquare
    }
  ];

  return (
    <div className="space-y-6">
      {/* Welcome Section */}
      <div className="bg-gradient-to-r from-blue-600 to-blue-800 rounded-xl p-6 text-white">
        <h1 className="text-2xl font-bold mb-2">مرحباً بك في Dexterity Dashboard</h1>
        <p className="text-blue-100">إدارة شاملة لموقع Dexterity - خدمات إدارة الأصول والموثوقية</p>
      </div>

      {/* Stats Grid */}
      <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        {stats.map((stat, index) => {
          const Icon = stat.icon;
          return (
            <div key={index} className="bg-white rounded-xl p-6 shadow-sm border border-gray-200">
              <div className="flex items-center justify-between">
                <div>
                  <p className="text-sm font-medium text-gray-600">{stat.title}</p>
                  <p className="text-2xl font-bold text-gray-900">{stat.value}</p>
                </div>
                <div className={`p-3 rounded-full ${stat.color}`}>
                  <Icon className="w-6 h-6 text-white" />
                </div>
              </div>
              <div className="mt-4 flex items-center">
                <span className={`text-sm font-medium ${
                  stat.changeType === 'positive' ? 'text-green-600' : 'text-red-600'
                }`}>
                  {stat.change}
                </span>
                <span className="text-sm text-gray-500 ml-2">من الشهر الماضي</span>
              </div>
            </div>
          );
        })}
      </div>

      {/* Recent Activities & Quick Actions */}
      <div className="grid grid-cols-1 lg:grid-cols-2 gap-6">
        {/* Recent Activities */}
        <div className="bg-white rounded-xl p-6 shadow-sm border border-gray-200">
          <h2 className="text-lg font-semibold text-gray-900 mb-4">النشاطات الأخيرة</h2>
          <div className="space-y-4">
            {recentActivities.map((activity, index) => {
              const Icon = activity.icon;
              return (
                <div key={index} className="flex items-start space-x-3">
                  <div className="flex-shrink-0">
                    <div className="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center">
                      <Icon className="w-4 h-4 text-gray-600" />
                    </div>
                  </div>
                  <div className="flex-1 min-w-0">
                    <p className="text-sm font-medium text-gray-900">{activity.title}</p>
                    <p className="text-sm text-gray-500">{activity.description}</p>
                    <p className="text-xs text-gray-400 mt-1">{activity.time}</p>
                  </div>
                </div>
              );
            })}
          </div>
        </div>

        {/* Quick Actions */}
        <div className="bg-white rounded-xl p-6 shadow-sm border border-gray-200">
          <h2 className="text-lg font-semibold text-gray-900 mb-4">إجراءات سريعة</h2>
          <div className="grid grid-cols-2 gap-4">
            <button className="p-4 bg-blue-50 hover:bg-blue-100 rounded-lg border border-blue-200 transition-colors">
              <Plus className="w-6 h-6 text-blue-600 mx-auto mb-2" />
              <span className="text-sm font-medium text-blue-700">إضافة خبر</span>
            </button>
            <button className="p-4 bg-green-50 hover:bg-green-100 rounded-lg border border-green-200 transition-colors">
              <Settings className="w-6 h-6 text-green-600 mx-auto mb-2" />
              <span className="text-sm font-medium text-green-700">إضافة خدمة</span>
            </button>
            <button className="p-4 bg-purple-50 hover:bg-purple-100 rounded-lg border border-purple-200 transition-colors">
              <Briefcase className="w-6 h-6 text-purple-600 mx-auto mb-2" />
              <span className="text-sm font-medium text-purple-700">إضافة وظيفة</span>
            </button>
            <button className="p-4 bg-orange-50 hover:bg-orange-100 rounded-lg border border-orange-200 transition-colors">
              <MessageSquare className="w-6 h-6 text-orange-600 mx-auto mb-2" />
              <span className="text-sm font-medium text-orange-700">عرض الرسائل</span>
            </button>
          </div>
        </div>
      </div>

      {/* Company Info */}
      <div className="bg-white rounded-xl p-6 shadow-sm border border-gray-200">
        <h2 className="text-lg font-semibold text-gray-900 mb-4">معلومات الشركة</h2>
        <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div className="text-center">
            <div className="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3">
              <TrendingUp className="w-8 h-8 text-blue-600" />
            </div>
            <h3 className="font-medium text-gray-900 mb-1">خدمات متكاملة</h3>
            <p className="text-sm text-gray-500">إدارة الأصول والموثوقية</p>
          </div>
          <div className="text-center">
            <div className="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
              <Users className="w-8 h-8 text-green-600" />
            </div>
            <h3 className="font-medium text-gray-900 mb-1">فريق متخصص</h3>
            <p className="text-sm text-gray-500">خبراء في المجال الصناعي</p>
          </div>
          <div className="text-center">
            <div className="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-3">
              <Settings className="w-8 h-8 text-purple-600" />
            </div>
            <h3 className="font-medium text-gray-900 mb-1">حلول مبتكرة</h3>
            <p className="text-sm text-gray-500">تقنيات حديثة ومتطورة</p>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Home;
