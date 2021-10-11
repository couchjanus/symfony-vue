// services/httpService.js
import http from "./http-conf";

class HttpService {
//   getAll() {
//     return http.get("/products;
//   }

//   get(id) {
//     return http.get(`/products/${id}`);
//   }
  get(url) {
    return http.get(url);
  }
  post(url, data){
    return http.post(url, data);
  }
  login_check(data) {
    return http.post("/login_check", data);
  }

  register(data){
    return http.post("/register", data);
  }

//   update(id, data) {
//     return http.put(`/tutorials/${id}`, data);
//   }

//   delete(id) {
//     return http.delete(`/tutorials/${id}`);
//   }

//   deleteAll() {
//     return http.delete(`/tutorials`);
//   }

//   findByTitle(title) {
//     return http.get(`/tutorials?title=${title}`);
//   }
}

export default new HttpService();