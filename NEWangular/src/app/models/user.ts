export class User {
    constructor(
        public id:string,
        public role_id: string,
        public state_id: string,
        public valid: string,
        public name:string,
        public first_name:string,
        public last_name:string,
        public email:string,
        public password:string,
        public folder:string
    ) { }
}
