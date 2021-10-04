import http from './http-conf';

class HttpService{
    login_check(data){
        return http.post('/login_check', data);
    }
}

export default new HttpService();