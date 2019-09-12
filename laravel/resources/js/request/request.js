import Qs from "qs";
// import axios from "axios";
const DOMAIN = '/';

window.axios.defaults.timeout =7000;







//
export function index(json) {
    // return axios.post(DOMAIN+'login', Qs.stringify(json), {headers: {'Content-Type': 'application/x-www-form-urlencoded'}});
    return window.axios.get(DOMAIN+'api/cruds');
}

export function add(json) {
    return window.axios.get(DOMAIN+'api/cruds/create');
}

export function modify(json) {
    return window.axios.put(DOMAIN+'api/cruds/' + json.id + '/?' + Qs.stringify(json));
}

export function remove(json) {
    return window.axios.delete(DOMAIN+'api/cruds/' + json.id + '/?' + Qs.stringify(json));
}