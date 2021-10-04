// services/httpService.js
import http from "./http-conf";

class HttpService {


  login_check(data) {
    return http.post("/login_check", data);
  }

  register(data){
    return http.post("/register", data);
  }


}

export default new HttpService();