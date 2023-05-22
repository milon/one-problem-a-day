---
extends: _layouts.post
section: content
title: Number of good leaf nodes pairs
problemUrl: https://leetcode.com/problems/number-of-good-leaf-nodes-pairs/
date: 2023-05-17
categories: [tree]
---

We can traverse the tree and find out the distance between each pair of leaf nodes. If the distance is less than or equal to the given distance, we increment the result by 1.

```python
class Solution:
    def countPairs(self, root: TreeNode, distance: int) -> int:
        self.res = 0
        
        def dfs(node: TreeNode) -> List[int]:
            if not node:
                return []
            if not node.left and not node.right:
                return [1]
            left = dfs(node.left)
            right = dfs(node.right)
            for i in left:
                for j in right:
                    if i + j <= distance:
                        self.res += 1
            return [i + 1 for i in left + right if i < distance]
        
        dfs(root)
        return self.res
```

Time complexity: `O(n^2)` where n is the number of nodes in the tree. <br/>
Space complexity: `O(h)` where h is the height of the tree.