---
extends: _layouts.post
section: content
title: Binary tree vertical order traversal
problemUrl: https://leetcode.com/problems/binary-tree-vertical-order-traversal/
date: 2022-11-28
categories: [tree]
---

We will use BFS to traverse the tree. We will keep track of the horizontal distance of each node from the root. We will use a dictionary to store the nodes at each horizontal distance. We will use a queue to traverse the tree. We will use a set to keep track of the horizontal distances of the nodes. We will use a list to store the result.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def verticalOrder(self, root: Optional[TreeNode]) -> List[List[int]]:
        if not root:
            return []
        
        cols = collections.defaultdict(list)
        q = collections.deque([(root, 0)])
        while q:
            qLen = len(q)
            for _ in range(qLen):
                node, col = q.pop()
                cols[col].append(node.val)
                if node.left:
                    q.appendleft((node.left, col-1))
                if node.right:
                    q.appendleft((node.right, col+1))
        
        return [cols[i] for i in sorted(cols)]
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`