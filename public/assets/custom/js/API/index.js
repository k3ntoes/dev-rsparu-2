import { kelompok } from "./kelompok.js";
import { provinsi } from "./provinsi.js";
import { kabupaten } from "./kabupaten.js";

export default class API {
    kelompok = () => kelompok()
    provinsi = () => provinsi()
    kabupaten = () => kabupaten()
}