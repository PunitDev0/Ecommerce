import bpy

# Delete all objects in the scene to start fresh
bpy.ops.object.select_all(action='SELECT')
bpy.ops.object.delete()

# Create the base of the body (torso)
bpy.ops.mesh.primitive_uv_sphere_add(segments=32, ring_count=16, radius=1, location=(0, 0, 1.5))
torso = bpy.context.object
torso.scale = (0.8, 1.2, 1.6)

# Create legs
for leg_pos in [-0.4, 0.4]:
    bpy.ops.mesh.primitive_cylinder_add(radius=0.25, depth=2.5, location=(leg_pos, 0, 0.5))
    leg = bpy.context.object
    leg.scale = (0.5, 0.5, 1.5)

# Create arms
for arm_pos in [-1.2, 1.2]:
    bpy.ops.mesh.primitive_cylinder_add(radius=0.2, depth=2.2, location=(arm_pos, 0, 2.0))
    arm = bpy.context.object
    arm.scale = (0.3, 0.3, 1.2)

# Create head
bpy.ops.mesh.primitive_uv_sphere_add(segments=32, ring_count=16, radius=0.5, location=(0, 0, 3.2))
head = bpy.context.object

# Create a cape (simple plane for the cape)
bpy.ops.mesh.primitive_plane_add(size=2, enter_editmode=False, location=(0, -0.8, 2.2))
cape = bpy.context.object
cape.scale = (0.6, 1.5, 0.2)

# Create eyes (basic spheres)
for eye_pos in [-0.15, 0.15]:
    bpy.ops.mesh.primitive_uv_sphere_add(segments=16, ring_count=8, radius=0.1, location=(eye_pos, 0.4, 3.4))
    eye = bpy.context.object
    eye.scale = (0.2, 0.2, 0.2)

# Create materials for body and cape
def create_material(name, color):
    mat = bpy.data.materials.new(name=name)
    mat.diffuse_color = (*color, 1)
    return mat

# Apply materials
body_mat = create_material("BodyMaterial", (0.1, 0.1, 0.8))  # Blue for the body
cape_mat = create_material("CapeMaterial", (0.8, 0.1, 0.1))  # Red for the cape
eye_mat = create_material("EyeMaterial", (1, 1, 1))  # White for the eyes

torso.data.materials.append(body_mat)
head.data.materials.append(body_mat)
for obj in bpy.data.objects:
    if "leg" in obj.name or "arm" in obj.name:
        obj.data.materials.append(body_mat)

cape.data.materials.append(cape_mat)
for obj in bpy.data.objects:
    if "Sphere" in obj.name and "eye" in obj.name:
        obj.data.materials.append(eye_mat)

# Position the camera and lighting
camera = bpy.data.objects['Camera']
camera.location = (0, -8, 3)
camera.rotation_euler = (1.3, 0, 0)

# Lighting
bpy.ops.object.light_add(type='SUN', location=(0, -6, 5))
sun = bpy.context.object
sun.data.energy = 5

# Render setup
bpy.context.scene.render.engine = 'CYCLES'
bpy.context.scene.render.filepath = "/tmp/superhero_render.png"

# Render image
bpy.ops.render.render(write_still=True)
