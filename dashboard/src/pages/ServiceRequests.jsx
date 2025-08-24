import React, { useState, useEffect } from 'react';
import api from '../config/api';

const ServiceRequests = () => {
  const [serviceRequests, setServiceRequests] = useState([]);
  const [statistics, setStatistics] = useState({});
  const [loading, setLoading] = useState(true);
  const [updateModalVisible, setUpdateModalVisible] = useState(false);
  const [selectedRequest, setSelectedRequest] = useState(null);
  const [updateStatus, setUpdateStatus] = useState('');

  // Fetch data on component mount
  useEffect(() => {
    fetchData();
  }, []);

  const fetchData = async () => {
    try {
      setLoading(true);
      const [requestsRes, statsRes] = await Promise.all([
        api.get('/service-requests'),
        api.get('/service-requests/statistics')
      ]);
      
      setServiceRequests(requestsRes.data?.data || []);
      console.log(requestsRes.data?.data);
      setStatistics(statsRes.data.data || {});
    } catch (error) {
      console.error('Error fetching data:', error);
      alert('Failed to fetch data');
    } finally {
      setLoading(false);
    }
  };

  const handleStatusUpdate = async () => {
    try {
      await api.patch(`/service-requests/${selectedRequest.id}/status`, { status: updateStatus });
      alert('Status updated successfully');
      setUpdateModalVisible(false);
      setSelectedRequest(null);
      setUpdateStatus('');
      fetchData(); // Refresh data
    } catch (error) {
      console.error('Error updating status:', error);
      alert('Failed to update status');
    }
  };

  const showUpdateModal = (record) => {
    setSelectedRequest(record);
    setUpdateModalVisible(true);
    setUpdateStatus(record.status);
  };

  const getStatusColor = (status) => {
    const colors = {
      pending: '#faad14',
      confirmed: '#52c41a',
      in_progress: '#1890ff',
      completed: '#722ed1',
      cancelled: '#ff4d4f',
      rescheduled: '#666666'
    };
    return colors[status] || '#666666';
  };

  const getUrgencyColor = (urgency) => {
    const colors = {
      low: '#52c41a',
      medium: '#faad14',
      high: '#ff4d4f',
      urgent: '#ff4d4f',
      critical: '#a8071a'
    };
    return colors[urgency] || '#666666';
  };

  if (loading) {
    return (
      <div style={{ textAlign: 'center', padding: '50px' }}>
        <div style={{ fontSize: '24px', color: '#666' }}>Loading service requests...</div>
      </div>
    );
  }

  return (
    <div style={{ padding: '24px' }}>
      <div style={{ marginBottom: '24px' }}>
        <h1 style={{ margin: 0, fontSize: '28px', fontWeight: 'bold' }}>
          Service Requests Dashboard
        </h1>
        <p style={{ margin: '8px 0 0 0', color: '#666' }}>
          Manage and track consultation requests from clients
        </p>
      </div>

      {/* Statistics Cards */}
      <div style={{ display: 'grid', gridTemplateColumns: 'repeat(auto-fit, minmax(250px, 1fr))', gap: '16px', marginBottom: '24px' }}>
        <div style={{ background: '#fff', padding: '20px', borderRadius: '8px', boxShadow: '0 2px 8px rgba(0,0,0,0.1)', borderLeft: '4px solid #1890ff' }}>
          <div style={{ fontSize: '24px', fontWeight: 'bold', color: '#1890ff' }}>
            {statistics.total_requests || 0}
          </div>
          <div style={{ color: '#666', marginTop: '8px' }}>Total Requests</div>
        </div>
        
        <div style={{ background: '#fff', padding: '20px', borderRadius: '8px', boxShadow: '0 2px 8px rgba(0,0,0,0.1)', borderLeft: '4px solid #faad14' }}>
          <div style={{ fontSize: '24px', fontWeight: 'bold', color: '#faad14' }}>
            {statistics.pending_requests || 0}
          </div>
          <div style={{ color: '#666', marginTop: '8px' }}>Pending</div>
        </div>
        
        <div style={{ background: '#fff', padding: '20px', borderRadius: '8px', boxShadow: '0 2px 8px rgba(0,0,0,0.1)', borderLeft: '4px solid #52c41a' }}>
          <div style={{ fontSize: '24px', fontWeight: 'bold', color: '#52c41a' }}>
            {statistics.confirmed_requests || 0}
          </div>
          <div style={{ color: '#666', marginTop: '8px' }}>Confirmed</div>
        </div>
        
        <div style={{ background: '#fff', padding: '20px', borderRadius: '8px', boxShadow: '0 2px 8px rgba(0,0,0,0.1)', borderLeft: '4px solid #722ed1' }}>
          <div style={{ fontSize: '24px', fontWeight: 'bold', color: '#722ed1' }}>
            {statistics.today_bookings || 0}
          </div>
          <div style={{ color: '#666', marginTop: '8px' }}>Today's Bookings</div>
        </div>
      </div>

      {/* Service Requests Table */}
      <div style={{ background: '#fff', borderRadius: '8px', boxShadow: '0 2px 8px rgba(0,0,0,0.1)' }}>
        <div style={{ padding: '20px', borderBottom: '1px solid #f0f0f0', display: 'flex', justifyContent: 'space-between', alignItems: 'center' }}>
          <h3 style={{ margin: 0 }}>Recent Consultation Requests</h3>
          <button 
            onClick={fetchData}
            style={{ 
              background: '#1890ff', 
              color: '#fff', 
              border: 'none', 
              padding: '8px 16px', 
              borderRadius: '4px', 
              cursor: 'pointer' 
            }}
          >
            Refresh
          </button>
        </div>
        
        <div style={{ overflowX: 'auto' }}>
          <table style={{ width: '100%', borderCollapse: 'collapse' }}>
            <thead>
              <tr style={{ background: '#fafafa' }}>
                <th style={{ padding: '12px', textAlign: 'left', borderBottom: '1px solid #f0f0f0' }}>ID</th>
                <th style={{ padding: '12px', textAlign: 'left', borderBottom: '1px solid #f0f0f0' }}>Company</th>
                <th style={{ padding: '12px', textAlign: 'left', borderBottom: '1px solid #f0f0f0' }}>Contact</th>
                <th style={{ padding: '12px', textAlign: 'left', borderBottom: '1px solid #f0f0f0' }}>Services</th>
                <th style={{ padding: '12px', textAlign: 'left', borderBottom: '1px solid #f0f0f0' }}>Date & Time</th>
                <th style={{ padding: '12px', textAlign: 'left', borderBottom: '1px solid #f0f0f0' }}>Status</th>
                <th style={{ padding: '12px', textAlign: 'left', borderBottom: '1px solid #f0f0f0' }}>Urgency</th>
                <th style={{ padding: '12px', textAlign: 'left', borderBottom: '1px solid #f0f0f0' }}>Actions</th>
              </tr>
            </thead>
            <tbody>
              {serviceRequests.map((request) => (
                <tr 
                  key={request.id} 
                  style={{ 
                    background: request.is_urgent ? '#fff2e8' : '#fff',
                    borderBottom: '1px solid #f0f0f0'
                  }}
                >
                  <td style={{ padding: '12px' }}>
                    <span style={{ 
                      background: '#1890ff', 
                      color: '#fff', 
                      padding: '4px 8px', 
                      borderRadius: '4px', 
                      fontSize: '12px' 
                    }}>
                      #{request.id}
                    </span>
                  </td>
                  <td style={{ padding: '12px' }}>
                    <div style={{ fontWeight: 'bold' }}>{request.company_name}</div>
                    <div style={{ fontSize: '12px', color: '#666' }}>{request.business_nature}</div>
                  </td>
                  <td style={{ padding: '12px' }}>
                    <div>{request.contact_person}</div>
                    <div style={{ fontSize: '12px', color: '#666' }}>{request.email}</div>
                    <div style={{ fontSize: '12px', color: '#666' }}>{request.phone}</div>
                  </td>
                  <td style={{ padding: '12px' }}>
                    <span style={{ 
                      background: '#52c41a', 
                      color: '#fff', 
                      padding: '4px 8px', 
                      borderRadius: '4px', 
                      fontSize: '12px' 
                    }}>
                      {request.total_services} services
                    </span>
                    <div style={{ fontSize: '12px', color: '#666', marginTop: '4px' }}>
                      {request.formatted_services || 'N/A'}
                    </div>
                  </td>
                  <td style={{ padding: '12px' }}>
                    <div>{new Date(request.booking_date).toLocaleDateString()}</div>
                    <div style={{ fontSize: '12px', color: '#666' }}>{request.booking_time}</div>
                    {request.is_today && (
                      <span style={{ 
                        background: '#faad14', 
                        color: '#fff', 
                        padding: '2px 6px', 
                        borderRadius: '4px', 
                        fontSize: '10px',
                        marginTop: '4px',
                        display: 'inline-block'
                      }}>
                        Today
                      </span>
                    )}
                  </td>
                  <td style={{ padding: '12px' }}>
                    <span style={{ 
                      background: getStatusColor(request.status), 
                      color: '#fff', 
                      padding: '4px 8px', 
                      borderRadius: '4px', 
                      fontSize: '12px' 
                    }}>
                      {request.formatted_status || request.status}
                    </span>
                  </td>
                  <td style={{ padding: '12px' }}>
                    <span style={{ 
                      background: getUrgencyColor(request.urgency_level), 
                      color: '#fff', 
                      padding: '4px 8px', 
                      borderRadius: '4px', 
                      fontSize: '12px' 
                    }}>
                      {request.urgency_level.charAt(0).toUpperCase() + request.urgency_level.slice(1)}
                    </span>
                  </td>
                  <td style={{ padding: '12px' }}>
                    <div style={{ display: 'flex', gap: '8px' }}>
                      <button 
                        onClick={() => alert(`View details for request #${request.id}`)}
                        style={{ 
                          background: '#1890ff', 
                          color: '#fff', 
                          border: 'none', 
                          padding: '4px 8px', 
                          borderRadius: '4px', 
                          fontSize: '12px',
                          cursor: 'pointer'
                        }}
                      >
                        View
                      </button>
                      <button 
                        onClick={() => showUpdateModal(request)}
                        disabled={request.status === 'confirmed'}
                        style={{ 
                          background: request.status === 'confirmed' ? '#ccc' : '#52c41a', 
                          color: '#fff', 
                          border: 'none', 
                          padding: '4px 8px', 
                          borderRadius: '4px', 
                          fontSize: '12px',
                          cursor: request.status === 'confirmed' ? 'not-allowed' : 'pointer'
                        }}
                      >
                        Confirm
                      </button>
                      <button 
                        onClick={() => showUpdateModal(request)}
                        disabled={request.status === 'in_progress'}
                        style={{ 
                          background: request.status === 'in_progress' ? '#ccc' : '#faad14', 
                          color: '#fff', 
                          border: 'none', 
                          padding: '4px 8px', 
                          borderRadius: '4px', 
                          fontSize: '12px',
                          cursor: request.status === 'in_progress' ? 'not-allowed' : 'pointer'
                        }}
                      >
                        Start
                      </button>
                    </div>
                  </td>
                </tr>
              ))}
            </tbody>
          </table>
        </div>
      </div>

      {/* Update Status Modal */}
      {updateModalVisible && (
        <div style={{
          position: 'fixed',
          top: 0,
          left: 0,
          right: 0,
          bottom: 0,
          background: 'rgba(0,0,0,0.5)',
          display: 'flex',
          alignItems: 'center',
          justifyContent: 'center',
          zIndex: 1000
        }}>
          <div style={{
            background: '#fff',
            padding: '24px',
            borderRadius: '8px',
            minWidth: '400px'
          }}>
            <h3 style={{ margin: '0 0 20px 0' }}>Update Request Status</h3>
            
            <div style={{ marginBottom: '20px' }}>
              <label style={{ display: 'block', marginBottom: '8px', fontWeight: 'bold' }}>
                New Status
              </label>
              <select 
                value={updateStatus}
                onChange={(e) => setUpdateStatus(e.target.value)}
                style={{
                  width: '100%',
                  padding: '8px',
                  border: '1px solid #d9d9d9',
                  borderRadius: '4px'
                }}
              >
                <option value="pending">Pending Review</option>
                <option value="confirmed">Confirmed</option>
                <option value="in_progress">In Progress</option>
                <option value="completed">Completed</option>
                <option value="cancelled">Cancelled</option>
                <option value="rescheduled">Rescheduled</option>
              </select>
            </div>
            
            <div style={{ display: 'flex', gap: '12px', justifyContent: 'flex-end' }}>
              <button 
                onClick={() => {
                  setUpdateModalVisible(false);
                  setSelectedRequest(null);
                  setUpdateStatus('');
                }}
                style={{
                  background: '#f5f5f5',
                  color: '#666',
                  border: '1px solid #d9d9d9',
                  padding: '8px 16px',
                  borderRadius: '4px',
                  cursor: 'pointer'
                }}
              >
                Cancel
              </button>
              <button 
                onClick={handleStatusUpdate}
                style={{
                  background: '#1890ff',
                  color: '#fff',
                  border: 'none',
                  padding: '8px 16px',
                  borderRadius: '4px',
                  cursor: 'pointer'
                }}
              >
                Update Status
              </button>
            </div>
          </div>
        </div>
      )}
    </div>
  );
};

export default ServiceRequests;
