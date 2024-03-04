
export const handleChange = (e, formData, setFormData) => {
    const { name, value } = e.target;
    setFormData(prevFormData => ({ ...prevFormData, [name]: value }));
};
