---
extends: _layouts.post
section: content
title: Count nodes equal to average of subtree
problemUrl: https://leetcode.com/problems/count-nodes-equal-to-average-of-subtree/
date: 2022-11-30
categories: [tree]
---

We will traverse the tree in post-order fashion. For each node, we will calculate the sum of all nodes in its subtree and the number of nodes in its subtree. Then we will check if the average of the subtree is equal to the value of the current node. If it is, we will increment the count by 1.

We will return the count of nodes equal to the average of their subtree.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def averageOfSubtree(self, root: Optional[TreeNode]) -> int:
        self.count = 0
        
        def dfs(root):
            if not root:
                return 0, 0
            
            leftSum, leftCount = dfs(root.left)
            rightSum, rightCount = dfs(root.right)
            
            _sum = leftSum + rightSum + root.val
            _count = leftCount + rightCount + 1
            
            if _sum // _count == root.val:
                self.count += 1
            
            return _sum, _count
        
        dfs(root)
        
        return self.count
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`
