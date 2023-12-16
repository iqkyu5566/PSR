import { axios } from './../../../node_modules/axios/dist/esm/axios';
const apiProject = axios.create({
  baseURL: process.env.NEXT_PUBLIC_API_URL,
});

export default apiProject;
