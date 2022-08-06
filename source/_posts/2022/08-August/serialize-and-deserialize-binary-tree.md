---
extends: _layouts.post
section: content
title: Serialize and deserialize binary tree
problemUrl: https://leetcode.com/problems/serialize-and-deserialize-binary-tree/
date: 2022-08-06
categories: [tree]
---

For serialize the tree, we will traverse the tree in preorder and whenever we hit a null node, we put a `#` character there. Then we join each character with a comma delimeter and return the string.

For deserialize the string, first we split the string with a comma delemeter. Then we run another preorder traversal, whenever we found a `#` character, we put a null node there, otherwise we create a tree node with the value. Finally, we return the root node.

```python
# Definition for a binary tree node.
# class TreeNode(object):
#     def __init__(self, x):
#         self.val = x
#         self.left = None
#         self.right = None

class Codec:
    def serialize(self, root: Optional[TreeNode]) -> str:
        res = []
        
        def dfs(root):
            if not root:
                res.append('#')
                return
            res.append(str(root.val))
            dfs(root.left)
            dfs(root.right)
        
        dfs(root)
        return ",".join(res)
            
    def deserialize(self, data: str) -> TreeNode:
        vals = data.split(",")
        self.i = 0
        
        def dfs():
            if vals[self.i] == "#":
                self.i += 1
                return None
            node = TreeNode(int(vals[self.i]))
            self.i += 1
            node.left = dfs()
            node.right = dfs()
            return node
        
        return dfs()
        
# Your Codec object will be instantiated and called as such:
# ser = Codec()
# deser = Codec()
# ans = deser.deserialize(ser.serialize(root))
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`