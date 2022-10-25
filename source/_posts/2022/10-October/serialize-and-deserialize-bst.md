---
extends: _layouts.post
section: content
title: Serialize and deserialize bst
problemUrl: https://leetcode.com/problems/serialize-and-deserialize-bst/
date: 2022-10-25
categories: [tree, design]
---

we will use preorder traversal to serialize the tree. Then we will use the preorder traversal to deserialize the tree as well.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, x):
#         self.val = x
#         self.left = None
#         self.right = None

class Codec:
    def serialize(self, root: Optional[TreeNode]) -> str:
        if not root: return ""
        stack, res = [root], []
        while stack:
            cur = stack.pop()
            res.append(cur.val)
            for child in filter(None, [cur.right, cur.left]):
                stack.append(child)
                
        return ' '.join(map(str, res))
        

    def deserialize(self, data: str) -> Optional[TreeNode]:
        preorder = [int(i) for i in data.split()]
        
        def helper(down, up):
            if self.idx >= len(preorder): 
                return None
            if not down <= preorder[self.idx] <= up: 
                return None
            
            root = TreeNode(preorder[self.idx])
            self.idx += 1
            root.left = helper(down, root.val)
            root.right = helper(root.val, up)
            
            return root
            
        self.idx = 0
        return helper(-math.inf, math.inf)
        
# Your Codec object will be instantiated and called as such:
# Your Codec object will be instantiated and called as such:
# ser = Codec()
# deser = Codec()
# tree = ser.serialize(root)
# ans = deser.deserialize(tree)
# return ans
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`